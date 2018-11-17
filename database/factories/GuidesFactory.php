<?php

use Faker\Generator as Faker;

$factory->define(\App\HunterGuide\Guides\Guides::class, function (Faker $faker) {
    $games = \App\HunterGuide\Games\Games::pluck('id')->toArray();
    $users = \App\HunterGuide\Users\Users::pluck('id')->toArray();
    return [
        'fkGames' => $faker->randomElement($games),
        'fkUsers' => $faker->randomElement($users),
        'visualizations' => 0,
        'title' => $faker->userName,
        'text' => $faker->realText(200)
    ];
});
