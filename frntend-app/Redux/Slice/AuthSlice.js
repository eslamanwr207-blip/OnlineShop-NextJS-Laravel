import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// إعداد Axios للـ API
const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  withCredentials: true,
});

// ✅ تسجيل الدخول
export const login = createAsyncThunk("auth/login", async (data, thunkAPI) => {
  try {
    const res = await api.post("/login", data);
    localStorage.setItem("token", res.data.token);
    return res.data;
  } catch (error) {
    return thunkAPI.rejectWithValue(error.response?.data || { message: "حدث خطأ أثناء تسجيل الدخول" });
  }
});

// ✅ إنشاء حساب جديد (Register)
export const registerUser = createAsyncThunk("auth/registerUser", async (data, thunkAPI) => {
  try {
    const res = await api.post("/register", data);
    return res.data;
  } catch (error) {
    return thunkAPI.rejectWithValue(error.response?.data || { message: "حدث خطأ أثناء إنشاء الحساب" });
  }
});

const authSlice = createSlice({
  name: "auth",
  initialState: { user: null, loading: false, error: null },
  reducers: {
    logout: (state) => {
      state.user = null;
      localStorage.removeItem("token");
    },
  },
  extraReducers: (builder) => {
    builder
      // ✅ Login reducers
      .addCase(login.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(login.fulfilled, (state, action) => {
        state.loading = false;
        state.user = action.payload.user;
      })
      .addCase(login.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload.message;
      })

      // ✅ Register reducers
      .addCase(registerUser.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(registerUser.fulfilled, (state, action) => {
        state.loading = false;
        state.user = action.payload.user;
      })
      .addCase(registerUser.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload.message;
      });
  },
});

export const { logout } = authSlice.actions;
export default authSlice.reducer;
