import Image from "next/image";
import styles from "./page.module.css";

import 'bootstrap/dist/css/bootstrap.css'
import Slider from "@/components/Home/Slider/Slider";
import FiveCategories from "@/components/Home/FiveCategories/FiveCategories";
import TwelveProducts from "@/components/Home/FiveCategories/TwelveProducts/TwelveProducts";



export default function Home() {
  return (
    <div className={styles.home} >
      <Slider/>
      <FiveCategories/>
      <TwelveProducts/>
    </div>
  );
}
