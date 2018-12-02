<?php

use Faker\Generator as Faker;

$factory->define(App\Model\FullTextSearch::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
    ];
});
