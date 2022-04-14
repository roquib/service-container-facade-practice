<?php

use App\Actions\LogToDatabase;
use App\Actions\LogToFile;
use App\Actions\MySqlConnection;
use App\Aggregator\ReportAggregator;
use App\Contracts\DbConnectionInterface;
use App\Filters\NullFilter;
use App\Filters\ProfanityFilter;
use App\Filters\TooLongFilter;
use App\Firewall;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentProvider\PaypalController;
use App\Http\Controllers\PaymentProvider\SquarePayController;
use App\Http\Controllers\PaymentProvider\StripeController;
use App\Reports\UserReport;
use App\Repositories\DbOrderRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    /**
     * interface example
     */
    // $loggers = [
    //     new LogToFile,
    //     new LogToDatabase,
    // ];
    // foreach ($loggers as $logger) {
    //     $controller = new UsersController($logger);

    //     $controller->show();
    // }

    /**
     * abstract class example
     */
    // $coffee = new \App\Actions\Coffee;
    // $coffee->make();

    // $tea = new \App\Actions\Tea;
    // $tea->make();


});


Route::get('orders', [OrdersController::class, 'index']);
Route::get('connections', [ConnectionsController::class, 'index']);

Route::get('pay-with-paypal', [PaypalController::class, 'index']);
Route::get('pay-with-stripe', [StripeController::class, 'index']);
Route::get('pay-with-squarepay', [SquarePayController::class, 'index']);

Route::get('firewall', function () {
    $firewall = App::make(Firewall::class);
    $firewall->show('null');
    $firewall->show('profanity');
    $firewall->show('toolong');
});

Route::get('tags', function () {
    $reports = App::make(ReportAggregator::class);
    $reports->aggregate();
});

Route::get('method-inv-inj', function () {
    return [App::call([new UserReport, 'generate']), App::call(fn (DbOrderRepository $repository) => $repository->getAll())];
});
