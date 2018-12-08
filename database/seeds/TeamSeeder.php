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

        // Attach other players to the team
        $team->players()->attach(2);
        $team->players()->attach(3);
        $team->players()->attach(4);
        $team->players()->attach(5);

        //Create another team
        $team = Team::create([
            'name' => 'TestEnCarton',
            'user_id' => 6,
            'game_id' => 1,
            'description' => 'Test',
            'avatar' => null,
        ]);

        //Attach the captain to the team players relation
        $team->players()->attach(6);

        // Attach other players to the team
        $team->players()->attach(7);
        $team->players()->attach(8);
        $team->players()->attach(9);
        $team->players()->attach(10);
    }
}
