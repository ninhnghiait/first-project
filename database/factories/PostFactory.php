<?php

use App\User;
use Faker\Generator as Faker;

$member1 = User::where('email', 'user1@ninhnghiait.dev')->first(); $user_id1 = $member1->id;
$member2 = User::where('email', 'user2@ninhnghiait.dev')->first(); $user_id2 = $member2->id;
$factory->define(App\Model\Post::class, function (Faker $faker) use ($user_id1, $user_id2) {
    return [
        'title' => $faker->sentence,
        'detail' => $faker->paragraph,
        'picture' => 'test.png',
        'user_id' => rand($user_id1, $user_id2)
        // 'user_id' => function() {
        //     return factory(App\User::class)->create()->id;
        // }
    ];
});
