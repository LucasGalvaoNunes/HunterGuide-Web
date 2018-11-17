<?php

use Faker\Generator as Faker;

$factory->define(\App\HunterGuide\Consoles\Consoles::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'pictureLink' => $faker->imageUrl(200,300)
    ];
});
