<?php

namespace App\Providers;

use App\Actions\MySqlConnection;
use App\Actions\OracleConnection;
use App\Contracts\DbConnectionInterface;
use Illuminate\Support\ServiceProvider;

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
