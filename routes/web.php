<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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