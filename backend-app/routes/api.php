<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FiveCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TwelveProductsController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


// 🔹 جميع المسارات الأخرى تحتاج إلى المصادقة (JWT)
    Route::get('category', [CategoryController::class, 'index']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::post('order', [OrderController::class, 'store']);
    Route::get('fivecategories', [FiveCategoryController::class, 'index']);
    Route::get('twelveproducts', [TwelveProductsController::class, 'index']);

Route::get('/settings', [SettingController::class, 'index']);
