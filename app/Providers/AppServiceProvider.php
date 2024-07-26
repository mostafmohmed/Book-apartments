<?php

namespace App\Providers;

use App\service\apartmentinterface;
use App\service\apartmentRepository;
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
        $this->app->bind(apartmentinterface::class,apartmentRepository::class);
    }
}
