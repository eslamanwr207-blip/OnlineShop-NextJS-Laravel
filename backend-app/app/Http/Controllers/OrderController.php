<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{

    public function index(){
        $orders = Order::all();
        return view('orders.orders', compact('orders'));
    }

    public function store(Request $request)
    {

        $orders = [];
        foreach ($request->products as $product) {
            $user = User::where('email', $product['user_id'])->first();
            $order = Order::create([
                'title'    => $product['title'],
                'category_id' => $product['category'],
                'price'    => $product['price'],
                'quantity' => $product['quantity'],
                'user_id'  => $user->id, // أو يمكنك تحديدها بناءً على سياق المستخدم
            ]);
            $orders[] = $order;
        }
        return response()->json($orders);
    }


    public function destroy(Request $request)
    {
        $order = Order::where('id', $request->pro_id)->first();
        $order->delete();
        return redirect()->route('orders.index');
    }




}
