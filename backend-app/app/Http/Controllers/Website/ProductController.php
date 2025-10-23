<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('website.products');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('website.productdetails', compact('product'));
    }

    public function cart()
    {
        return view('website.cart');
    }

    public function order(Request $request)
    {
        $data = $request->all();

        $order = Order::create($data);

        // أو استخدام $request->json()->all() إن كان من نوع JSON
        return response()->json([
            'success' => true,
            'message' => 'Order received',
            'data' => $data
        ]);

    }


}
