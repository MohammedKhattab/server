<?php

use App\Order;
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

Route::view('/', 'index');

Route::get('orders/{order}/checkout', 'OrderController@index');
Route::put('orders/{order}', 'OrderController@update');
Route::post('orders/{order}/{method}', 'BillingController@show');
Route::any('check/{order}/{method}', 'BillingController@store')->name('payments.callback');

Route::get('pages/{page}', 'PagesController');
Route::get('{order}', 'OrderController@show');
