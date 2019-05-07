<?php

namespace App\Providers;

use App\Composers\GeneralComposer;
use Illuminate\Support\ServiceProvider;

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
    }
}
