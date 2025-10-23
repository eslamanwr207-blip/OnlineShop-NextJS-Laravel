<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()){
            $settings = Setting::firstOr(function (){
               return Setting::create([
                   'title'=> 'website title',
                   'description'=> 'website description',
               ]);

            });

            $categories = Category::all();
            $products = Product::all();
            $orders = Order::all();
            $users = User::all();



            view()->share([
                'settings' => $settings,
                'categories' => $categories,
                'products' => $products,
                'orders' => $orders,
                'users' => $users
            ]);
        }
    }
}
