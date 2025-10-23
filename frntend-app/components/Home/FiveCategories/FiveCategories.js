'use client';


import { getAllCategories } from "@/Redux/Slice/CategorySlice";
import Link from "next/link";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";

import style from '../../../app/categories/categoris.module.css';

export default function FiveCategories(){

    const dispatch = useDispatch();

    const  {categories, loading, error } = useSelector((state)=>state.categories);

    useEffect(()=>{
        dispatch(getAllCategories());
    }, [dispatch]);

    if(loading) return <p>Loading...</p>
    if(error) return <p>حدث خطأ: {error}</p>
    return(
        <div className={style.cat} >
            <h1 >الاقسام</h1>

                <div className={style.FiveCategories} >
                
                {
                    categories.length > 0 && (
                        categories.slice(0,5).map((category, key)=>(

                            <div key={key} className={style.mincategory} >
                                <Link style={{textDecoration:'none'}} href={'/categories/'+category.id} >
                                <img className={style.category_image} src={`http://127.0.0.1:8000/${category.image}`} />
                                <h2 className={style.category_title} >{category.title}</h2></Link>
                                
                            </div>
                        ))
                    )
                }



            </div>
        </div>
    )
}