<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return response()->json([
            'categories' => $categories,
            'message' => 'success',
            'status' => 200,

        ]);


    }

    public function show($id)
    {


        $category = Category::find($id);

        // جلب جميع الأقسام الفرعية لهذا القسم
        $categoryIds = $category->children()->pluck('id')->toArray(); // الأقسام الفرعية
        $categoryIds[] = $category->id; // إضافة القسم الرئيسي نفسه

        // جلب جميع المنتجات التي تنتمي إلى القسم الرئيسي أو أي قسم فرعي
        $products = \App\Models\Product::whereIn('category_id', $categoryIds)->get();

        return response()->json([
            'products' => $products,
            'message' => 'Products retrieved successfully',
            'status' => 200,
        ]);
    }



}
