import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

export const getAllProducts = createAsyncThunk(
    "products/getAll",
    async(_, thunkAPI)=>{
        try{
            const res = await axios.get("http://127.0.0.1:8000/api/product");
            return res.data.products;

        }catch(error){
            return thunkAPI.rejectWithValue(error.response?.data || "حدث خطأ");
        }
    }
);

export const getProductDetails = createAsyncThunk(
    "products/getDetails",
    async(id, thunkAPI)=>{
        try{
            const res = await axios.get(`http://127.0.0.1:8000/api/product/${id}`);
            return res.data.product;
        }catch(error){
            return thunkAPI.rejectWithValue(error.response?.data || "حدث خطأ");
        }
    }
);

const productSlice = createSlice({
    name: "products",
    initialState:{
        products:[],
        productDetails:null,
        loading: false,
        error:null,

    },
    reducers:{},
    extraReducers:(builder)=>{
        builder
            .addCase(getAllProducts.pending, (state)=>{
                state.loading = true;
            })
            .addCase(getAllProducts.fulfilled, (state, action)=>{
                state.loading = false;
                state.products = action.payload;
            })
            .addCase(getAllProducts.rejected, (state, action)=>{
                state. loading = false;
                state.error = action.payload;
            })
            .addCase(getProductDetails.pending, (state)=>{
                state.loading = true;
            })
            .addCase(getProductDetails.fulfilled, (state, action)=>{
                state.loading = false;
                state.productDetails = action.payload;
            })
            .addCase(getProductDetails.rejected, (state, action)=>{
                state.loading = false;
                state.error = action.payload;
            })
    }
})

export default productSlice.reducer;