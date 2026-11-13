<?php

namespace App\Providers;

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
        // Tautan halaman bawaan Laravel bergaya Tailwind. Proyek ini memakai
        // Bootstrap 5, jadi pilih tampilan paginasi Bootstrap 5.
        Paginator::useBootstrapFive();
    }
}
