<?php

use Faker\Generator as Faker;

$factory->define(\App\HunterGuide\Categorys\Categorys::class, function (Faker $faker) {
    return [
        'name' => $faker->userName
    ];
});
