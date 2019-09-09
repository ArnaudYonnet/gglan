<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\TournamentPlace;
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
        $players = TournamentPlace::all()->where('payed', true);
        return view('admin.tournaments.index')
                ->with('tournaments', Tournament::all())
                ->with('players', $players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'finish' => 'required|date',
            'description' => 'required|string|max:255',
            'teams_place' => 'required|numeric',
            'cashprize' => 'required|string',
        ]);

        $tournament = new Tournament;
            $tournament->name = $request->name;
            $tournament->game_id = $request->game_id;
            $tournament->start = $request->start;
            $tournament->finish = $request->finish;
            $tournament->description = $request->description;
            $tournament->teams_place = $request->teams_place;
            $tournament->cashprize = $request->cashprize;
        $tournament->save();

        flash('The tournament has been successfully created !')->success();
        return redirect()->route('admin.tournaments.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'finish' => 'required|date',
            'description' => 'required|string|max:255',
            'teams_place' => 'required|numeric',
            'cashprize' => 'required|string',
            'status' => 'required|string',
        ]);
        
        $tournament->name = $request->name;
        $tournament->game_id = $request->game_id;
        $tournament->start = $request->start;
        $tournament->finish = $request->finish;
        $tournament->description = $request->description;
        $tournament->teams_place = $request->teams_place;
        $tournament->cashprize = $request->cashprize;
        $tournament->status = $request->status;
        $tournament->save();

        flash('The tournament has been successfully updated !')->success();
        return redirect()->route('admin.tournaments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->teams()->detach();
        $tournament->delete();

        flash('The tournament has been successfully deleted !')->success();
        return redirect()->route('admin.tournaments.index');
    }
}
