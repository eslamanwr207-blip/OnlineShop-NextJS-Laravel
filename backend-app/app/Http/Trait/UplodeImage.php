<?php

namespace App\Http\Trait;

use Illuminate\Support\Str;

trait UplodeImage
{
    public function uploadImage($file, $folder)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($folder), $filename);

        // تصحيح المسار ليكون نسبيًا
        $path = $folder . '/' . $filename;

        return $path;
    }
}
