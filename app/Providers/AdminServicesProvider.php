<?php

namespace App\Providers;

use App\Services\AdminServices;
use App\Services\Impl\AdminServicesImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServicesProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public array $singletons =
    [
        AdminServices::class => AdminServicesImpl::class
    ];

    public function provides():array
        {
        return[AdminServices::class];
        }

    public function register(): void
    {
        //use if you need
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
