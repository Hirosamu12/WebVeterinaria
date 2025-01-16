<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Gate::define('manage-users', function ($user) {
            if ($user->id_Rol == 1) {
            return true;
            } // Example: check an `is_admin` column
        });


        Gate::define('manage-pets', function ($user) {
            if ($user->id_Rol == 2) {
            return true;
            } // Example: check an `is_vet` column
        });


        Gate::define('see-pets', function ($user) {
            if ($user->id_Rol == 3) {
            return true;
            } // Example: check an `is_user` column
        });
    }


}
