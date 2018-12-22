<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(10),
        'players_team' => 5,
    ];
});
