<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('website.categories');
    }
    public function show($id){
        $products = Product::where('category_id', $id)->get();
        return view('website.products', compact('products'));
    }
}
