<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1'
], function () {
    Route::post('/register/customer', 'API\\CustomerController@store');
    Route::post('/register/client', 'API\\ClientController@store');
    Route::post('/contacts', 'API\\ContactController@store');
    Route::post('/jobs', 'API\\JobController@store');
});

Route::post('/microboard/read_admin_notifications/{user}', function (\App\User $user) {
    $user->unreadNotifications->each->markAsRead();
});
