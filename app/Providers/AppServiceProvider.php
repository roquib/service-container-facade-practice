<?php

namespace App\Providers;

use App\Actions\MySqlConnection;
use App\Actions\OracleConnection;
use App\Aggregator\ReportAggregator;
use App\Contracts\DbConnectionInterface;
use App\Contracts\Logger;
use App\Filters\NullFilter;
use App\Filters\ProfanityFilter;
use App\Filters\TooLongFilter;
use App\Firewall;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PaymentProvider\PaypalController;
use App\Http\Controllers\PaymentProvider\SquarePayController;
use App\Http\Controllers\PaymentProvider\StripeController;
use App\Interfaces\PaymentInterface;
use App\Reports\CpuReport;
use App\Reports\MemoryReport;
use App\Services\FilterService;
use App\Services\PaypalService;
use App\Services\ReportService;
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


        $this->app->when(Firewall::class)
            ->needs(FilterService::class)
            ->give(function ($app) {
                return [
                    'null' => $app->make(NullFilter::class),
                    'profanity' => $app->make(ProfanityFilter::class),
                    'toolong' => $app->make(TooLongFilter::class)
                ];
            });

        $this->app->when(Firewall::class)
            ->needs(Logger::class)
            ->give(function ($app) {
                return new \App\Actions\LogToFile();
            });


        $this->app->bind(CpuReport::class, function () {
            return new CpuReport();
        });

        $this->app->bind(MemoryReport::class, function () {
            return new MemoryReport();
        });

        $this->app->tag([CpuReport::class, MemoryReport::class], 'reports');
        $this->app->when(ReportAggregator::class)
            ->needs(ReportService::class)
            ->giveTagged('reports');
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
