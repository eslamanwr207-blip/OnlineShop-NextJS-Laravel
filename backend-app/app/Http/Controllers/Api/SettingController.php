<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return response()->json([
            'settings' => $settings,
            'message' => 'success',
            'status' => 200,

        ]);
    }
}
