<?php

namespace ApiChef\PayHere;

use ApiChef\PayHere\Http\Controllers\PaymentNotificationController;
use ApiChef\PayHere\View\Components\PayHereFields;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PayHereServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewComponentsAs('pay-here', [
            PayHereFields::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'pay-here');

        $this->publishes([
            __DIR__.'/../config/pay-here.php' => config_path('pay-here.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/pay-here.php',
            'pay-here'
        );

        $this->app->bind('pay-here', function ($app) {
            return $app->make(PayHere::class);
        });
    }

    private function registerRoutes()
    {
        Route::middleware(config('pay-here.middleware_group'))
            ->as('pay-here.')
            ->group(function () {
                Route::post('/notify', PaymentNotificationController::class)->name('notify');
            });
    }
}
