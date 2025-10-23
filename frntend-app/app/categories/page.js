'use client';
import styles from './categoris.module.css';
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import { getAllCategories } from "../../Redux/Slice/CategorySlice";
import Link from "next/link";

export default function Categories() {
  const dispatch = useDispatch();
  const { categories, loading, error } = useSelector((state) => state.categories);

  useEffect(() => {
    if(localStorage.getItem("token") === null){
      window.location.href = "/login";
    }
    dispatch(getAllCategories());

  }, [dispatch]);

  if(localStorage.getItem("token") === null){
    window.location.href = "/login";
  }

  if (loading) return <p>Loading...</p>;
  if (error) return <p>حدث خطأ: {error}</p>;

  

  return (
        <div>
          <div className={styles.categories} >

              {
                  categories.length > 0 && (
                      categories.map((category, key)=>(

                          <div key={key} className={styles.mincategory} >
                              <Link style={{textDecoration:'none'}} href={'/categories/'+category.id} >
                              <img className={styles.category_image} src={`http://127.0.0.1:8000/${category.image}`} />
                              <h2 className={styles.category_title} >{category.title}</h2></Link>
                              
                          </div>
                      ))
                  )
              }

          </div>
        </div>
  );
}
