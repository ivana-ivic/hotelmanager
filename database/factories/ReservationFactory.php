<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +10 days');
    return [
        'status' => 'V',
        'date' => now(),
        'description' => str_random(30),
        'arrival_date' => $start,
        'departure_date' => $end,
        'valid_until' => $start,
    ];
});
