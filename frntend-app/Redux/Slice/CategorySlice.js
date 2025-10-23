import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// 🟢 لجلب جميع التصنيفات
export const getAllCategories = createAsyncThunk(
  "categories/getAll",
  async (_, thunkAPI) => {
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/category");
      return res.data.categories;
    } catch (error) {
      return thunkAPI.rejectWithValue(error.response?.data || "حدث خطأ");
    }
  }
);

// 🟢 لجلب المنتجات حسب التصنيف
export const getProductsByCategories = createAsyncThunk(
  "categories/getProductsByCategories",
  async (id, thunkAPI) => {
    try {
      const res = await axios.get(`http://127.0.0.1:8000/api/category/${id}`);
      return res.data.products;
    } catch (error) {
      return thunkAPI.rejectWithValue(error.response?.data || "حدث خطأ");
    }
  }
);

const categorySlice = createSlice({
  name: "categories",
  initialState: {
    categories: [],
    productsByCategory: [],
    loading: false,
    error: null,
  },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(getAllCategories.pending, (state) => {
        state.loading = true;
      })
      .addCase(getAllCategories.fulfilled, (state, action) => {
        state.loading = false;
        state.categories = action.payload;
      })
      .addCase(getAllCategories.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(getProductsByCategories.pending, (state) => {
        state.loading = true;
      })
      .addCase(getProductsByCategories.fulfilled, (state, action) => {
        state.loading = false;
        state.productsByCategory = action.payload;
      })
      .addCase(getProductsByCategories.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      });
  },
});

export default categorySlice.reducer;
