<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class TeamTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_get_team_page_but_not_auth()
    {
        $response = $this->get('/players/teams');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Assert that we have a team page with one player as captain
     *
     * @return void
     */
    public function test_get_team_page_with_one_player()
    {
        $game = factory('App\Game')->create();

        $player = factory('App\User')->create();
        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
        ]);

        $player->teams()->attach($team->id);

        $response = $this->actingAs($player)->get('/players/teams');

        $response->assertStatus(200);
        $response->assertSeeText($team->name);
        $response->assertSeeText($player->pseudo);
        $response->assertDontSeeText('Supprimer');
    }

    /**
     * Assert that we have a team page with players as a captain player
     *
     * @return void
     */
    public function test_get_team_page_with_players()
    {
        $game = factory('App\Game')->create();

        $player = factory('App\User')->create();
        $player2 = factory('App\User')->create();

        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
            ]);
            
        factory('App\JoinRequest')->create([
            'team_id' => $team->id,
            'user_id' => $player2->id,
            'status' => 'accepted',
        ]);

        $player->teams()->attach($team->id);
        $player2->teams()->attach($team->id);

        $response = $this->actingAs($player)->get('/players/teams');

        $response->assertStatus(200);
        $response->assertSeeText($team->name);
        $response->assertSeeText($player->pseudo);
        $response->assertSeeText($player2->pseudo);

        // Check that we have the delete button 
        $response->assertSeeText('Delete');
    }

    /**
     * Assert that we have the right team page with a not captain player
     *
     * @return void
     */
    public function test_get_team_page_with_players_not_captain()
    {
        $game = factory('App\Game')->create();

        $player = factory('App\User')->create();
        $player2 = factory('App\User')->create();

        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
            ]);
            
        factory('App\JoinRequest')->create([
            'team_id' => $team->id,
            'user_id' => $player2->id,
            'status' => 'accepted',
        ]);

        $player->teams()->attach($team->id);
        $player2->teams()->attach($team->id);

        $response = $this->actingAs($player2)->get('/players/teams');

        $response->assertStatus(200);
        $response->assertSeeText($team->name);

        // Assert that we have only a 'Leave' button
        $response->assertSeeText('Quitter');
    }

    /**
     * Assert that we delete a player from the team
     *
     * @return void
     */
    public function test_delete_players()
    {
        $game = factory('App\Game')->create();

        $player = factory('App\User')->create();
        $player2 = factory('App\User')->create();

        
        $team = factory('App\Team')->create([
            'user_id' => $player->id,
            'game_id' => $game->id,
            ]);
            
        factory('App\JoinRequest')->create([
            'team_id' => $team->id,
            'user_id' => $player2->id,
            'status' => 'accepted',
        ]);

        $player->teams()->attach($team->id);
        $player2->teams()->attach($team->id);

        $response = $this->actingAs($player)->get('/players/teams');

        $response->assertStatus(200);
        $response->assertSeeText($team->name);
        $response->assertSeeText($player->pseudo);
        $response->assertSeeText($player2->pseudo);

        $deleteResponse = $this->delete('teams/' . $team->id . '/deleteMate', [
            'user_id' => $player2->id,
            'team' => $team->id
        ]);

        $deleteResponse->assertStatus(302);
        $deleteResponse->assertDontSeeText($player2->pseudo);
    }

    public function test_create_team()
    {
        $player = factory('App\User')->create();

        $game = factory('App\Game')->create();

        Storage::fake('avatars');
        $avatar = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($player)->post('/teams', [
            'name' => 'Test',
            'game_id' => $game->id,
            'avatar' => $avatar,
        ]);

        $response->assertStatus(302);

        $response = $this->actingAs($player)->get('/players/teams');
        $response->assertSeeText('Test');
    }
}
