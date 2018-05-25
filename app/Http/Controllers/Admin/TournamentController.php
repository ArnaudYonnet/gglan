<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.tournaments.index')->with('tournaments', Tournament::all());
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
        ]);

        $tournament = new Tournament;
            $tournament->name = $request->name;
            $tournament->game_id = $request->game_id;
            $tournament->start = $request->start;
            $tournament->finish = $request->finish;
            $tournament->description = $request->description;
            $tournament->teams_place = $request->teams_place;
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
            'status' => 'required|string',
        ]);
        
        $tournament->name = $request->name;
        $tournament->game_id = $request->game_id;
        $tournament->start = $request->start;
        $tournament->finish = $request->finish;
        $tournament->description = $request->description;
        $tournament->teams_place = $request->teams_place;
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
