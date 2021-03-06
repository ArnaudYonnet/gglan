<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\TournamentPlace;
use App\Tournament;
use App\User;
use App\Team;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.tournaments.index')->with('tournaments', Tournament::where('status', 'open')->get());
    }

    /**
     * Register a team for a tournament
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Add team to the tournament
        $tournament = Tournament::find($request->tournament_id);
        $tournament->teams()->attach($request->team_id);
        
        // Find the team
        $team = Team::find($request->team_id);

        // Add players of the team to the listing 
        foreach ($team->players as $player) {
            TournamentPlace::create([
                'tournament_id' => $tournament->id,
                'team_id'       => $team->id,
                'user_id'       => $player->id,
                'payed'         => false, 
            ]);
        }

        flash('You have been successfully registered for this tournament !')->success();
        return redirect()->back();
    }

    /**
     * Unsubscribe a team for a tournament
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function unregister(Request $request)
    {
        $tournament = Tournament::find($request->tournament_id);
        $tournament->teams()->detach($request->team_id);

        // Find the team
        $team = Team::find($request->team_id);
        TournamentPlace::where('team_id', $request->team_id)->where('payed',0)->delete();

        flash('You have been successfully unregistered for this tournament !')->success();
        return redirect()->back();
    }
    
    /**
     * Redirect to the success page after purchasing a place to a tournament
     *
     * @return \Illuminate\Http\Response
     */
    public function buySuccess()
    {   
        // Update the payed field for this player
        $userPlace = TournamentPlace::where('user_id', Auth::id())->first();
        $userPlace->payed = 1;
        $userPlace->save();

        flash('Vos achat a bien été enregistré, nous vous attendons au tournois !')->success();
        return redirect()->route('tournaments.index');
    }

    /**
     * Redirect to the fail page after attempting to purchase a place in a tournament
     *
     * @return \Illuminate\Http\Response
     */
    public function buyFail()
    {
        flash('Une erreur est survenu lors de votre achat :/')->error();
        return redirect()->back();
    }
}
