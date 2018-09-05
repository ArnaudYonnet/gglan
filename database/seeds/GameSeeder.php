<?php

use Illuminate\Database\Seeder;
use App\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => "CS:GO",
            'description' => "FPS 1st person",
            'players_team' => 5
        ]);

        Game::create([
            'name' => "LOL",
            'description' => "MOBA",
            'players_team' => 5
        ]);

        Game::create([
            'name' => "Fortnite",
            'description' => "FPS 3rd person",
            'players_team' => 5
        ]);
    }
}
