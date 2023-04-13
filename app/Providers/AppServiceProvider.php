<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\DashboardComposer;

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
        // the key is too long for long indexes, so we can skip overriding it to 191
        Schema::defaultStringLength(191);
        // pagination
        Paginator::useTailwind();
        // view composer, pass data to views globally
        View::composer('dashboard.index', DashboardComposer::class);
    }
}
