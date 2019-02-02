<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +10 days');
    return [
        'status' => 'V',
        'date' => now(),
        'description' => $faker->text,
        'arrival_date' => $start,
        'departure_date' => $end,
        'valid_until' => $start,
        'room_id' => rand (1, 4),
        'user_id' => 1,
    ];
});
