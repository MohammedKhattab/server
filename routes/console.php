<?php

use App\Order;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('turnWaitingPaymentOrdersToDidNotPay', function () {
    Order::where('status', 2)->get()->each->updateStatusTo(4);
})->describe('It will turn waiting payment orders to did not pay status.');
