"use client";

import { useEffect, useState } from "react";
import axios from "axios";
import styles from "./cart.module.css"; // يمكنك إنشاء ملف CSS Module جديد بنفس الاسم

export default function CartPage() {
  const [cart, setCart] = useState([]);
  const [email, setEmail] = useState("");

  // تحميل البيانات من localStorage بعد تحميل الصفحة
  useEffect(() => {
    const storedCart = JSON.parse(localStorage.getItem("cart")) || [];
    const storedEmail = localStorage.getItem("email");
    setCart(storedCart);
    setEmail(storedEmail);
  }, []);

  // حذف منتج من السلة
  const removeFromCart = (id) => {
    const updatedCart = cart.filter((item) => item.id !== id);
    setCart(updatedCart);
    localStorage.setItem("cart", JSON.stringify(updatedCart));
  };

  // إرسال الطلبات إلى Laravel API
  const addToOrders = async () => {
    if (cart.length === 0) {
      alert("⚠️ السلة فارغة، لا يمكن إرسال الطلب!");
      return;
    }

    const orderData = {
      products: cart.map((item) => ({
        user_id: email,
        title: item.title,
        category: item.category_id,
        price: item.price,
        quantity: item.quantity,
      })),
    };

    console.log("📤 إرسال الطلب:", orderData);

    try {
      const response = await axios.post("http://127.0.0.1:8000/api/order", orderData);

      if (response.status === 200) {
        alert("✅ تم إرسال الطلب بنجاح!");
        localStorage.removeItem("cart");
        setCart([]);
      } else {
        alert("حدث خطأ أثناء إرسال الطلب، حاول مرة أخرى.");
      }
    } catch (error) {
      console.error("❌ Error submitting order:", error);
      if (error.response) {
        console.log("Response data:", error.response.data);
      }
      alert("حدث خطأ في الاتصال بالسيرفر!");
    }
  };

  return (
    <div style={{ textAlign: "center" }}>
      <div className={styles.products} style={{ marginTop: "80px" }}>
        <div className={styles.product}>
          {cart.length > 0 ? (
            cart.map((ca, key) => (
              <div key={key} className={styles.minproduct}>
                <img src={`http://127.0.0.1:8000/${ca.image}`} alt={ca.title} />
                <h2>{ca.title}</h2>
                <div>
                  <span className={styles.newPrice}>
                    {ca.price * ca.quantity} EGP
                  </span>
                  <span className={styles.newPrice}>{ca.price} EGP</span>
                  <span className={styles.newPrice}>{ca.quantity}</span>
                </div>
                  <button className={`${styles.delete} btn btn-danger`}
                  onClick={() => removeFromCart(ca.id)}>
                
                  حذف
                </button>
              </div>
            ))
          ) : (
            <p>🛒 لا توجد منتجات في السلة</p>
          )}
        </div>
      </div>

      <button
        className="btn btn-success"
        style={{ width: "90%", marginTop: "50px" }}
        onClick={addToOrders}
      >
        تأكيد الطلبات
      </button>
    </div>
  );
}
