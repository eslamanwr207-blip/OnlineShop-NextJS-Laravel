"use client"

import React, { use, useState } from "react";
import Carousel from 'react-bootstrap/Carousel';
 
import styles from "./Slider.module.css";





export default function Slider() {
  const image1 = "/8.jpg";
const image2 = "/11.jpg";
const image3 = "/9.webp";
    return(
        <div className={styles.slider} >
        <Carousel>
            <Carousel.Item interval={1000}>
            <img src={image1} text="First slide" />
            <Carousel.Caption>
                <h3>ماذا تنتظر</h3>
                <p>% هناك خصومات تصل الى 50</p>
            </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item interval={500}>
            <img src={image2} text="Second slide" />
            <Carousel.Caption>
            <h3>ماذا تنتظر</h3>
            <p>% هناك خصومات تصل الى 50</p>
            </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
            <img src={image3} text="Third slide" />
            <Carousel.Caption>
            <h3>ماذا تنتظر</h3>
            <p>% هناك خصومات تصل الى 50</p>
            </Carousel.Caption>
            </Carousel.Item>
      </Carousel>
        </div>
    
    )
}





