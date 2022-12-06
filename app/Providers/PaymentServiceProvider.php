<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentService::class, function($app) {
            // Ici je fais un appel à une API qui me renvoi la valeur de la balance
            $balence = 10000;
            return new PaymentService($balence);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [PaymentService::class];
    }
}
