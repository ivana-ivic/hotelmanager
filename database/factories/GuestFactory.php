<?php

use Faker\Generator as Faker;

$factory->define(App\Guest::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date,
        'country' => $faker->country,
        'identification_doc' => $faker->isbn10,
        'email' => '39supilif@gmail.com'
    ];
});
