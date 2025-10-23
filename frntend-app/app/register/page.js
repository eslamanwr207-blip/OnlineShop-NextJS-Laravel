"use client";

import styles from "./register.module.css";
import { useState } from "react";
import { useRouter } from "next/navigation";

export default function RegisterPage() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
  });
  const [message, setMessage] = useState("");
  const router = useRouter();

  const handleChange = (e) =>
    setFormData({ ...formData, [e.target.name]: e.target.value });

  const handleSubmit = async (e) => {
    e.preventDefault();
    setMessage("");

    // تحقق من تطابق كلمتي المرور
    if (formData.password !== formData.password_confirmation) {
      setMessage("Passwords do not match ❌");
      return;
    }

    try {
      const response = await fetch("http://127.0.0.1:8000/api/auth/register", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          name: formData.name,
          email: formData.email,
          password: formData.password,
          password_confirmation: formData.password_confirmation, // ✅ مضافة
        }),
      });

      const data = await response.json();

      if (response.ok) {
        setMessage("✅ Account created successfully!");
        setFormData({
          name: "",
          email: "",
          password: "",
          password_confirmation: "",
        });

        // توجيه المستخدم إلى صفحة تسجيل الدخول بعد النجاح
        setTimeout(() => {
          router.push("/login");
        }, 1000);
      } else {
        // عرض الخطأ القادم من Laravel
        const errorMsg =
          data.message ||
          (data.errors &&
            Object.values(data.errors).flat().join(" - ")) ||
          "Registration failed";
        setMessage(errorMsg);
      }
    } catch (error) {
      console.error("Error:", error);
      setMessage("Error connecting to server");
    }
  };

  return (
    <div className={styles.loginContainer}>
      <div className={styles.registerBox}>
        <h2>Create Account</h2>
        {message && <p className="message">{message}</p>}
        <form onSubmit={handleSubmit}>
          <div className={styles.inputGroup}>
            <label>Name</label>
            <input
              type="text"
              name="name"
              value={formData.name}
              onChange={handleChange}
              required
            />
          </div>
          <div className={styles.inputGroup}>
            <label>Email</label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              required
            />
          </div>
          <div className={styles.inputGroup}>
            <label>Password</label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              required
            />
          </div>
          <div className={styles.inputGroup}>
            <label>Confirm Password</label>
            <input
              type="password"
              name="password_confirmation"
              value={formData.password_confirmation}
              onChange={handleChange}
              required
            />
          </div>
          <button type="submit" className={styles.registerButton}>
            Register
          </button>
        </form>
      </div>
    </div>
  );
}
