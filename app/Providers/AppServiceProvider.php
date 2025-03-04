<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ServiceService;
use App\Repositories\ServiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    
        {
            $this->app->bind(ServiceService::class, function ($app) {
                return new ServiceService(new ServiceRepository());
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
