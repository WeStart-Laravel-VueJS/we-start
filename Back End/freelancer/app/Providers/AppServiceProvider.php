<?php

namespace App\Providers;

use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as View2;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::share('name', 'Ali');

        // Using closure based composers...
        View2::composer('index', function (View $view) {
            $view->with('name', 'ezz');
        });
    }
}
