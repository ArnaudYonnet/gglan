<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => 1,
        'description' => $faker->sentence(10),
        'avatar' => null,
        'game_id' => 1,
    ];
});
