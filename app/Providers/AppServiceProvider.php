<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\category;
use App\Models\tag;

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
        //use style bootstrap
        Paginator::useBootstrapFive();
        //define of share view 
        View::share('categories', category::all());
        View::share('tags', tag::all());
    }
}
