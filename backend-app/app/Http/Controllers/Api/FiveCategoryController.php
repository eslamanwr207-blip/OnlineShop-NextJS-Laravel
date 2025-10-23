<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FiveCategoryController extends Controller
{
    public function index(){
        $categories = Category::limit(5)->get();
        return response()->json([
            'categories' => $categories,
            'message' => 'success',
            'status' => 200,

        ]);
    }

}


