"use client";

import { useEffect } from "react";
import { useRouter } from "next/navigation";

export default function AuthGuard({ children }) {
  const router = useRouter();

  useEffect(() => {
    const token = localStorage.getItem("token");

    if (!token) {
      router.replace("/login"); // ⬅️ توجيه للصفحة المطلوبة
    }
  }, [router]);

  return children;
}
