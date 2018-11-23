<?php

use Faker\Generator as Faker;

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

$factory->define(\App\HunterGuide\Users\Users::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'picture' => $faker->imageUrl(200,300),
        'background' => $faker->imageUrl(200,300),
        'lastName' => $faker->lastName,
        'aboutMe' => $faker->text(30),
        'userName' => $faker->userName,
        'password' => '$2y$10$84M1cBrCMtQn2diWA8.KFu41nzi/gFZbwKEk7waGGo9SY8Gtv0K36',
    ];
});
