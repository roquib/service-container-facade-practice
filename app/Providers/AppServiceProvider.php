<?php

namespace App\Providers;

use App\Actions\MySqlConnection;
use App\Actions\OracleConnection;
use App\Contracts\DbConnectionInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PaymentProvider\PaypalController;
use App\Http\Controllers\PaymentProvider\SquarePayController;
use App\Http\Controllers\PaymentProvider\StripeController;
use App\Interfaces\PaymentInterface;
use App\Services\PaypalService;
use App\Services\SquarePayService;
use App\Services\StripeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\OrderRepositoryInterface', 'App\Repositories\DbOrderRepository');

        $this->app->bind(DbConnectionInterface::class, function ($app) {
            return new MySqlConnection();
        });

        $this->app->when(PaypalController::class)
            ->needs(PaymentInterface::class)
            ->give(PaypalService::class);

        $this->app->when(StripeController::class)
            ->needs(PaymentInterface::class)
            ->give(StripeService::class);

        $this->app->when(SquarePayController::class)
            ->needs(PaymentInterface::class)
            ->give(SquarePayService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
