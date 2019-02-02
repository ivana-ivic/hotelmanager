<?php

use Faker\Generator as Faker;

$factory->define(App\Stay::class, function (Faker $faker) {
    return [
        'check_in_time' => $faker->dateTimeBetween('this week', '+0 days'),
        'memo' => 'Lorem ipsum'
    ];
});
