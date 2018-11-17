<?php

use Faker\Generator as Faker;

$factory->define(\App\HunterGuide\Games\Games::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'pictureLink' => $faker->imageUrl(200,300)
    ];
});
