<?php

use Faker\Generator as Faker;

$factory->define(App\JoinRequest::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'team_id' => 1,
        'status' => 'waiting',
    ];
});
