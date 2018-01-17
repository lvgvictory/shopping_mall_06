<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Slide;
use App\Models\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['pages.home', 'layouts.slide'], function($view){
            $slides = Slide::where('active', config('custom.defaultOne'))->get();
            $slides1 = Slide::where('active', config('custom.defaultDiscount'))->get();

            $view->with([
                'slides' => $slides,
                'slides1' => $slides1,
            ]);
        });

        view()->composer(['layouts.header'], function($view){
            $categories = Category::all();

            $view->with([
                'categories' => $categories,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
