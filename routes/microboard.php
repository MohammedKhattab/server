<?php

use Illuminate\Support\Facades\Route;

Route::resource('orders', 'OrderController');
Route::resource('advertisements', 'AdvertisementController');
Route::resource('pages', 'PageController');
Route::resource('jobs', 'JobController');
Route::resource('contacts', 'ContactController');

Route::patch('orders/{order}/change-status', 'OrderController@changeStatus')->name('orders.change-status');
