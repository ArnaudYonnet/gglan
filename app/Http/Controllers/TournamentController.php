<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tournament;

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
        $tournament = Tournament::find($request->tournament_id);
        $tournament->teams()->attach($request->team_id);

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

        flash('You have been successfully unregistered for this tournament !')->success();
        return redirect()->back();
    }
}
