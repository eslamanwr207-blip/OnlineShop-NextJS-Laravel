<?php

namespace App\Http\Controllers;

use App\Http\Trait\UplodeImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UplodeImage;
    public function index()
    {
        $categories = Category::all();

        $maincategories = Category::where('parent_id', 0)
            ->orWhereNull('parent_id')
            ->get();

        return view('categories.categories', compact('categories', 'maincategories'));

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
//        $validatedData = $request->validate([
//            'title'=>'required',
//            'parent_id'=>'nullable',
//            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//        ]);

        $category = Category::create($request->except('image','_token'));

        if ($request->file('image')) {
            $category->update(['image' => $this->uploadImage($request->image, 'categories')]);
        }


        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        $category->fill($request->except('image','_token'))->save();
//
//        if ($request->file('image')) {
//            $category->update(['image'=>$this->uploadImage($request->image, 'categories')]);
//        }
//
//
//        $category = $this->category->findOrFail($request->pro_id);
//        return $category->update([
//            'name' => $request->sectoin_name,
//            'image' => $request->image,
//        ]);
//
//        return redirect()->route('category.index');

        $category = Category::findOrFail($request->pro_id);
        $category->update($request->except('image','_token'));
        if ($request->file('image')) {
            $category->update(['image'=>$this->uploadImage($request->image, 'categories')]);
        }


        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->pro_id)->first();



        $category->delete();
        return redirect()->route('categories.index')->with('success', 'تم الحذف بنجاح!');
    }

}
