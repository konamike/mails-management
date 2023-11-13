<?php

namespace App\Providers;

use App\Models\Filedispatch;
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
        // Filedispatch::observe(Filedispatch::class);
    }
}
