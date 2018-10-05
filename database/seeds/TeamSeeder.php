<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the team
        $team = Team::create([
            'name' => 'NaCl',
            'user_id' => 1,
            'game_id' => 1,
            'description' => 'Le sel',
            'avatar' => null,
        ]);

        //Attach the captain to the team players relation
        $team->players()->attach(1);
    }
}
