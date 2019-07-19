<?php

namespace App\Providers;

use App\Composers\GeneralComposer;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * 
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // View Composers 
        view()->composer('*', GeneralComposer::class);

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
