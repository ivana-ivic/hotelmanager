<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'status' => 0,
        'date' => now(),
        'description' => '',
        'arrival_date' => now(),
        'valid_until' => now()
    ];
});
