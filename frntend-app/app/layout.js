import NavBar from "@/components/Layouts/NavBar/NavBar";
import "./globals.css";
import Providers from "./Providers";
import 'bootstrap/dist/css/bootstrap.css'
import Footer from "@/components/Layouts/Footer/Footer";
import { use } from "react";
import AuthGuard from "@/components/AuthGuard";
import MainLayout from "@/components/Layouts/MainLayout";

export const metadata = {
  title: "Online Shop",
  description: "Next.js + Redux Toolkit setup",
};

export default function RootLayout({ children }) {

  

  return (
    <html lang="en">
      <body>
        {/* ✅ هنا نستدعي مكون الـ Provider */}
        <MainLayout>
        <AuthGuard>
          <Providers>{children}</Providers>
        </AuthGuard>
        </MainLayout>
        
      </body>
    </html>
  );
}
