<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class PlayerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Assert see the pseudo of the player
     *
     * @return void
     */
    public function test_get_player_page()
    {
        $player = factory('App\User')->create();

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($player->pseudo);
        $response->assertSee($player->description);
    }

    /**
     * Assert see the pseudo of the player and his game
     *
     * @return void
     */
    public function test_get_player_page_with_game()
    {
        $game = factory('App\Game')->create();
        
        $player = factory('App\User')->create();
        $player->games()->attach($game->id);

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($game->name);
    }
    
    /**
     * Assert see the pseudo of the player and his games
     *
     * @return void
     */
    public function test_get_player_page_with_games()
    {
        $game = factory('App\Game')->create();
        $game2 = factory('App\Game')->create();
        
        $player = factory('App\User')->create();
        $player->games()->attach($game->id);
        $player->games()->attach($game2->id);

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($game->name);
        $response->assertSee($game2->name);
    }
    
    /**
     * Assert see the pseudo of the player, his game and the rank
     *
     * @return void
     */
    public function test_get_player_page_with_game_with_rank()
    {
        $game = factory('App\Game')->create();
        $rank = factory('App\Rank')->create([
            'game_id' => $game->id,
        ]);
        
        $player = factory('App\User')->create();
        $player->games()->attach($game->id);
        DB::table('game_user')
            ->where('user_id', $player->id)
            ->where('game_id', $game->id)
            ->update(['rank_id' => $rank->id]);

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($game->name);
        $response->assertSee($rank->name);
    }

    /**
     * Assert the pseudo of the player and his team
     *
     * @return void
     */
    public function test_get_player_page_with_team()
    {
        $game = factory('App\Game')->create();

        $player = factory('App\User')->create();
        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
        ]);
        
        $player->teams()->attach($team->id);

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($team->name);
        $response->assertSee($game->name);
    }

    /**
     * Assert the pseudo of the player and his team
     *
     * @return void
     */
    public function test_get_player_page_with_teams()
    {
        $game = factory('App\Game')->create();
        $game2 = factory('App\Game')->create();

        $player = factory('App\User')->create();
        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
        ]);

        $team2 = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game2->id,
        ]);
        
        $player->teams()->attach($team->id);
        $player->teams()->attach($team2->id);

        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        $response->assertSee($team->name);
        $response->assertSee($game->name);
        $response->assertSee($team2->name);
        $response->assertSee($game2->name);
    }
}
