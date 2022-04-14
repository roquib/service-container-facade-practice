<?php

use App\Actions\LogToDatabase;
use App\Actions\LogToFile;
use App\Actions\MySqlConnection;
use App\Contracts\DbConnectionInterface;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentProvider\PaypalController;
use App\Http\Controllers\PaymentProvider\SquarePayController;
use App\Http\Controllers\PaymentProvider\StripeController;

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
