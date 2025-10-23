'use client'; // 👈 لازم عشان يشتغل Redux في Client فقط

import { Provider } from "react-redux";
import { store } from "../Redux/Store";

export default function Providers({ children }) {
  return <Provider store={store}>{children}</Provider>;
}