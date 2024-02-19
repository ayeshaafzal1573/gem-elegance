<?php

namespace App\Providers;

use App\Models\Banners;
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
        // Using a view composer to share $banners variable with all views
        view()->composer('front.layouts.app', function ($view) {
            $banners = Banners::all();
            $view->with('banners', $banners);
        });
    }
}
