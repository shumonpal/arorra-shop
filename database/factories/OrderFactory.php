<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'payer_id' => $faker->randomDigitNotNull,
        'invoice_id' => $faker->word,
        'invoice_description' => $faker->text,
        'discount' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'payer_email' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
