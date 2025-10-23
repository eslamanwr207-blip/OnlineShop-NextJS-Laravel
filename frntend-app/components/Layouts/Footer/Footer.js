import React from "react";
import styles from "./Footer.module.css";

import { FaFacebook, FaTwitter, FaInstagram, FaYoutube } from "react-icons/fa";

export default function Footer() {
  return (
    <footer className={styles.footer}>
      <div className={styles.container}>
        <div className={styles.footerContent}>
          <div className={styles.footerSection + " " + styles.about}>
            <h2>OnlineShop</h2>
            <p>أفضل متجر إلكتروني يوفر لك تجربة تسوق ممتعة وسهلة.</p>
          </div>

          <div className={styles.footerSection + " " + styles.links}>
            <h2>روابط سريعة</h2>
            <ul>
              <li><a href="/">الرئيسية</a></li>
              <li><a href="/products">المنتجات</a></li>
              <li><a href="/category">الأقسام</a></li>
              <li><a href="/cart">عربة التسوق</a></li>
            </ul>
          </div>

          <div className={styles.footerSection + " " + styles.social}>
            <h2>تابعنا</h2>
            <div className={styles.socialIcons}>
              <a href="#"><FaFacebook /></a>
              <a href="#"><FaTwitter /></a>
              <a href="#"><FaInstagram /></a>
              <a href="#"><FaYoutube /></a>
            </div>
          </div>
        </div>

        <div className={styles.footerBottom}>
          <p>جميع الحقوق محفوظة &copy; 2025 OnlineShop</p>
        </div>
      </div>
    </footer>
  );
};

