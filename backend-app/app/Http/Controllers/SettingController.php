<?php

namespace App\Http\Controllers;

use App\Http\Trait\UplodeImage;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    use UplodeImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.settings');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validatedData = $request->validate([
            'title'=> 'required',
            'logo'=> 'nullable|image|max:1999',
            'favicon'=> 'nullable|image|max:1999',
            'email'=> 'required|email',
            'facebook'=> 'nullable|url',
            'description'=> 'required',
        ]);

        $setting->update([
            'title'=> $validatedData['title'],
            'email'=> $validatedData['email'],
            'facebook'=> $validatedData['facebook'],
            'description'=> $validatedData['description'],

        ]);



        if ($request->hasFile('logo')) {
            $setting->update(['logo'=>$this->uploadImage($request->logo, 'logo')]);
        }

        if ($request->hasFile('favicon')) {
            $setting->update(['favicon'=>$this->uploadImage($request->favicon, 'favicon' )]);
        }


        return redirect('settings');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
