<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [IndexController::class, 'index'])->name('index');
    Route::get('index/show/{id}', [IndexController::class, 'show'])->name('index.show');

    Route::get('dashboard/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('dashboard/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');


    Route::resource('dashboard/categories', CategoryController::class);
    Route::resource('dashboard/products', ProductController::class);

    Route::get('dashboard/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::delete('/dashboard/orders/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');








    Route::get('category', [\App\Http\Controllers\Website\CategoryController::class, 'index'])->name('categories.index');
    Route::get('category/{id}', [\App\Http\Controllers\Website\CategoryController::class, 'show'])->name('categories.show');

    Route::get('products_', [\App\Http\Controllers\Website\ProductController::class, 'index'])->name('products.index');
    Route::get('productdetails/{id}', [\App\Http\Controllers\Website\ProductController::class, 'show'])->name('products.show');

    Route::get('cart', [\App\Http\Controllers\Website\ProductController::class, 'cart'])->name('products.cart');
    Route::post('order', [\App\Http\Controllers\Website\ProductController::class, 'order'])->name('products.order');


});

Route::get('/', [\App\Http\Controllers\Website\HomeController::class, 'index'])->name('index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);





Route::get('/{page}', [AdminController::class, 'index']);


























