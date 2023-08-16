<?php

namespace App\Providers;

use App\Models\newcake;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        // View::share('cakes',newcake::with('user')->latest()->get());

        View::composer(['newcake.admin.index'], function ($view) {
            $view->with('cakes', newcake::with('user')->latest()->cursor());
        }
        );
    }
}
