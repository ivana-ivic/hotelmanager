<?php

namespace App\Providers;

use App\Reservation;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        app()->bind('new_reservation', function(){
            $reservation = new Reservation;
            $reservation->created_at = now();
            $reservation->updated_at = now();
            $reservation->status = 'V';
            $reservation->date = today();
            return $reservation;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
        }

    }
}
