<?php

namespace App\Http\Controllers;

use App\Http\Trait\UplodeImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UplodeImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();



        return view('products.products', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file( 'image'), 'products' );
        }
        $colors = isset($request['colors']) ? implode(',', $request['colors']) : null;
        $sizes = isset($request['sizes']) ? implode(',', $request['sizes']) : null;

        $product = Product::create($request->except(['image', 'colors', 'sizes']));

        $product->update(['image' => $image, 'colors' => $colors, 'sizes' => $sizes]);

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = null;
        $product = Product::where('id', $request->pro_id)->first();
        $product->update($request->except(['image', 'colors', 'sizes']));
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file( 'image'), 'products' );
        }
        $colors = isset($request['colors']) ? implode(',', $request['colors']) : null;
        $sizes = isset($request['sizes']) ? implode(',', $request['sizes']) : null;
        $product->update(['image' => $image, 'colors' => $colors, 'sizes' => $sizes]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->pro_id)->first();
        $product->delete();
        return redirect()->route('products.index');
    }
}
