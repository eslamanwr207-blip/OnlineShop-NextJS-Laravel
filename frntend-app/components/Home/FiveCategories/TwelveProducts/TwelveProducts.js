'use client';

import styles from '../../../../app/products/Product.module.css';
import { getAllProducts } from "@/Redux/Slice/ProductSlice";
import Link from 'next/link';
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux"

export default function TwelveProducts(){
    const dispatch = useDispatch();
    const { products, loading, error } = useSelector((state)=> state.products);

    useEffect(()=>{
        dispatch(getAllProducts());
    },[dispatch]);

    if (loading) return <p>Loading...</p>;
    if (error) return <p>حدث خطأ: {error}</p>;

    return(
        <div className={styles.pro} >
            <h1>المنتجات</h1>

        <div className={styles.products} style={{marginTop:'80px'}} >
            <div className={styles.product} >
                {
                    products.length > 0 &&(
                        products.map((product, key)=>(
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
        </div>
    )
}