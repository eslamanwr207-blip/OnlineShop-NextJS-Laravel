// src/redux/store.js
import { configureStore } from "@reduxjs/toolkit";
import categorySlice from "../Redux/Slice/CategorySlice"; // ✅ هذا السطر هو المهم
import productSlice from "../Redux/Slice/ProductSlice"; // ✅ هذا السطر هو المهم
import AuthSlice from "../Redux/Slice/AuthSlice"; // ✅ هذا السطر هو المهم

export const store = configureStore({
  reducer: {
    auth: AuthSlice,
    categories: categorySlice,
    products: productSlice,
  },
  devTools: process.env.NODE_ENV !== "production", // ✅ DevTools جاهز تلقائيًا
});
