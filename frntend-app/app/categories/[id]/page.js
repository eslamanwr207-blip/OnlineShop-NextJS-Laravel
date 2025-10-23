"use client";

import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useParams } from "next/navigation";
import { getProductsByCategories } from "@/Redux/Slice/CategorySlice";

import styles from '../../products/Product.module.css';
import Link from "next/link";

export default function Category() {
  const { id } = useParams();
  const dispatch = useDispatch();

  const { productsByCategory, loading, error } = useSelector(
    (state) => state.categories
  );

  useEffect(() => {
    if (id) {
      dispatch(getProductsByCategories(id));
    }
  }, [dispatch, id]);



  return (
        <div className={styles.products} style={{marginTop:'80px'}} >
            <div className={styles.product} >
                {
                    productsByCategory.length > 0 &&(
                        productsByCategory.map((product, key)=>(
                            <div  key={key} className={styles.minproduct} >
                                <img src={`http://127.0.0.1:8000/${product.image}`} />
                                <h2>{product.title}</h2>
                                <div>
                                    <span className={styles.newPrice} >{product.price}</span>
                                    <span className={styles.oldPrice} >{product.discount}</span>
                                </div>
                                <Link href={'/products/'+product.id} ><button>اضافة الى السلة</button></Link>
                            </div>
                        ))
                    )
                }
            </div>
        </div>
  );
}
