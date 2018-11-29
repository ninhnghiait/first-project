<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });


$factory->define(App\User::class, function (Faker $faker) {
    return [[
        'name' => 'superadministrator',
        'email' => 'superadministrator@ninhnghiait.dev',
        'email_verified_at' => now(),
        'password' => Hash::make('123456'), // secret
        'remember_token' => str_random(10),
    ],[
        'name' => 'administrator',
        'email' => 'administrator@ninhnghiait.dev',
        'email_verified_at' => now(),
        'password' => Hash::make('123456'), // secret
        'remember_token' => str_random(10),
    ],[
         'name' => 'member1',
         'email' => 'member1@ninhnghiait.dev',
         'email_verified_at' => now(),
         'password' => Hash::make('123456'), // secret
         'remember_token' => str_random(10),
    ],[
         'name' => 'member2',
         'email' => 'member2@ninhnghiait.dev',
         'email_verified_at' => now(),
         'password' => Hash::make('123456'), // secret
         'remember_token' => str_random(10),
    ]
    ];
});
// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => 'administrator',
//         'email' => 'administrator@ninhnghiait.dev',
//         'email_verified_at' => now(),
//         'password' => Hash::make('123456'), // secret
//         'remember_token' => str_random(10),
//     ];
// });
// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => 'member1',
//         'email' => 'member1@ninhnghiait.dev',
//         'email_verified_at' => now(),
//         'password' => Hash::make('123456'), // secret
//         'remember_token' => str_random(10),
//     ];
// });
// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => 'member2',
//         'email' => 'member2@ninhnghiait.dev',
//         'email_verified_at' => now(),
//         'password' => Hash::make('123456'), // secret
//         'remember_token' => str_random(10),
//     ];
// });
