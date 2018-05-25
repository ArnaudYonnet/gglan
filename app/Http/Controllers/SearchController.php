<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;

class SearchController extends Controller
{
    public function players(Request $request)
    {
        $players = User::where('pseudo', 'like', '%'.$request->name.'%')->paginate(12);

        if ($players->count() == 0) 
        {
            flash('No player found...')->error();
            return view('site.players.index')->with('players', User::paginate(12));
        }

        if ($players->count() == 1) {
            return view('site.players.show')->with('player', User::where('pseudo', 'like', '%'.$request->name.'%')->first());
        }
        else
        {
            return view('site.players.index')->with('players', $players);
        }
    }

    public function teams(Request $request)
    {
        $teams = Team::where('name', 'like', '%'.$request->name.'%')->paginate(12);

        if ($teams->count() == 0) 
        {
            flash('No team found...')->error();
            return view('site.teams.index')->with('teams', Team::paginate(12));
        }

        if ($teams->count() == 1) {
            return view('site.teams.show')->with('team', Team::where('name', 'like', '%'.$request->name.'%')->first());
        }
        else
        {
            return view('site.teams.index')->with('teams', $teams);
        }
    }
}
