"use client";

import styles from "./ProductDetails.module.css";
import { getProductDetails } from "@/Redux/Slice/ProductSlice";
import { useParams, useRouter } from "next/navigation";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";

export default function Product(){

    const router = useRouter();

    const {id} = useParams();
    const dispatch = useDispatch();
    const { productDetails, loading, error } = useSelector((state)=> state.products);

    const [quantity, setQuantity] = useState(1); // كمية المنتج


    useEffect(()=>{
        if (id) {
        dispatch(getProductDetails(id));
        }
    }, [dispatch, id]);

    if(loading) return <p>Loading...</p>;
    if(error) return <p>حدث خطأ: {error}</p>;

      if (!productDetails) return <p>لا توجد بيانات</p>;
    
        // 🔹 دالة لحفظ المنتج في `localStorage`
    const addToCart = () => {
        const cart = JSON.parse(localStorage.getItem("cart")) || []; // جلب البيانات القديمة أو مصفوفة فارغة
        const existingProduct = cart.find((item) => item.id === productDetails.id);

        if (existingProduct) {
            // تحديث الكمية إذا كان المنتج مضاف مسبقًا
            existingProduct.quantity += quantity;
        } else {
            // إضافة المنتج الجديد
            cart.push({ ...productDetails, quantity });
        }

        localStorage.setItem("cart", JSON.stringify(cart)); // تخزين البيانات
        alert("تمت إضافة المنتج إلى السلة 🛒");

        router.push("/cart"); // الانتقال إلى صفحة السلة

    };

    return(
        <div className={styles.details}>
            <h1>تفاصيل المنتج</h1>
            <div className={styles.productdetails}>
                <div className={`col-6 ${styles.myBox}`}>
                    <img src={`http://127.0.0.1:8000/${productDetails.image}`} alt={productDetails.title} />
                </div>
                <div id="text" className={styles.col6}>
                    <h2>{productDetails.title}</h2>
                    <div className={styles.prices}>
                        <span className={styles.newPrice}>L.E {productDetails.price}</span>
                        <span className={styles.oldPrice}>L.E {productDetails.discount}</span>
                    </div>
                    <h3>{productDetails.colors}</h3>
                    <h3>{productDetails.sizes}</h3>

                    <div>
                        <input 
                            type="number" 
                            value={quantity} 
                            min="1"
                            onChange={(e) => setQuantity(parseInt(e.target.value))}
                        />
                                                <label> الكمية  :  </label>

                    </div>
                    <label>الوصف </label>
                    <p>{productDetails.description}</p>
                </div>
            </div>
            <button onClick={addToCart}>إضافة إلى السلة</button>
        </div>
    )
}