<?php

use Faker\Generator as Faker;

$factory->define(App\Stay::class, function (Faker $faker) {
    return [
        'check_in_time' => now(),
        'memo' => 'Lorem ipsum'
    ];
});
