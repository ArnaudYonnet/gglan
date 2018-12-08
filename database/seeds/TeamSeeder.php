<?php

use Illuminate\Database\Seeder;

use App\JoinRequest;
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
        $players = [2, 3, 4, 5];
        foreach ($players as $player) {
            $team->players()->attach($player);
            JoinRequest::create([
                'user_id' => $player,
                'team_id' => $team->id,
                'status'  => 'accepted',
            ]);
        }

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
        $players = [7, 8, 9, 10];
        foreach ($players as $player) {
            $team->players()->attach($player);
            JoinRequest::create([
                'user_id' => $player,
                'team_id' => $team->id,
                'status'  => 'accepted',
            ]);
        }
    }
}
