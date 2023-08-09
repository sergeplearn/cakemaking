<?php

namespace App\Providers;

use App\Models\newcake;
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
        // View::share('cakes',newcake::with('user')->latest()->get());

        View::composer(['newcake.admin.index', 'Home'], function ($view) {
            $view->with('cakes', newcake::with('user')->latest()->get());
        }
        );
    }
}
