<?php

namespace App\Providers;

use App\Models\DanhMuc;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();
        view()->composer('*', function ($view) {
            $danhMucHome = DanhMuc::get();
            $view->with(compact('danhMucHome'));
        });
    }
}
