<?php

namespace App\Providers;

use App\Services\Calculation\CalculationServiceInterface;
use App\Services\Calculation\Calculation1Service;
use App\Services\Calculation\Calculation2Service;
use App\Services\Calculation\Calculation3Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
