<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class TwelveProductsController extends Controller
{
    public function index(){
        $products = Product::limit(12)->get();

        return response()->json([
            'products' => $products,
            'message' => 'Products retrieved successfully',
            'status' => 200,
        ]);
    }
}
