<?php

namespace App\Providers;

use App\Repositories\Interfaces\MasterRepositoryInterface;
use App\Repositories\MasterRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MasterRepositoryInterface::class, MasterRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
