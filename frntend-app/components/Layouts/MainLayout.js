"use client"; // مهم جدًا لأن الملف يستخدم useEffect و localStorage

import { useEffect, useState } from "react";
import { useRouter, usePathname } from "next/navigation";
import NavBar from "./NavBar/NavBar";
import Footer from "./Footer/Footer";

export default function MainLayout({ children }) {
  const [hasToken, setHasToken] = useState(false);
  const router = useRouter();
  const pathname = usePathname();

  useEffect(() => {
    // يتم تنفيذ هذا الكود فقط في المتصفح
    const token = localStorage.getItem("token");

    if (token) {
      setHasToken(true);
    } else {
      setHasToken(false);
      // ✅ لا تقم بإعادة التوجيه إذا كان المستخدم في صفحة login أو register
      if (pathname !== "/login" && pathname !== "/register") {
        router.replace("/login");
      }
    }
  }, [router, pathname]);

  return (
    <>
      {/* ✅ عرض الـ NavBar فقط لو المستخدم مسجل */}
      {hasToken && <NavBar />}

      <main>{children}</main>

      {hasToken && <Footer />}
    </>
  );
}
