<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('index.index', compact('categories'));


    }

    public function show($id)
    {

        $categories = Category::where('id', $id)->first();
        $cat_id = $categories->id;
        $products = Product::where('category_id', $cat_id)->get();

        $categories = Category::all();


        return view('index.productbycategory', compact('products', 'categories'));


    }

}
