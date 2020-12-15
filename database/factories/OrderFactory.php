<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create(),
        'is_for_client' => rand(1, 0),
        'city' => 'الرياض',
        'target_name' => $faker->name,
        'target_references' => 'واتساب',
        'target_phone' => '0123456789',
        'target_city' => 'جدة',
        'product_type' => 'سيارات',
        'product_price' => $price = rand(1111, 9999),
        'status' => rand(0, 5),
        'amount' => $price + 10,
        'payment_method' => 'on-delivery',
        'paid_at' => rand(0, 1) ? now() : null,
        'created_at' => now(),
    ];
});
