<?php

namespace App\Providers;

use App\Services\DashboardServices;
use App\Services\Impl\DahsboardServiceImpl;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public array $singletons = [
        DashboardServices::class => DahsboardServiceImpl::class
    ];

    public function provides()
    {
        return [DashboardServices::class];
    }

    public function register(): void
    {
        //do something
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
