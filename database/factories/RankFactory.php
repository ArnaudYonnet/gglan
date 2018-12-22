<?php

use Faker\Generator as Faker;

$factory->define(App\Rank::class, function (Faker $faker) {
    return [
        'game_id' => 1,
        'name' => $faker->word,
        'logo' => null,
    ];
});
