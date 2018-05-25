<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\JoinRequest;
use App\User;
use App\Team;
use App\Mail\JoinTeam;

class JoinTeamController extends Controller
{
    public function store(Request $request)
    {
        $token = str_random(45);
        $join = new JoinRequest;
            $join->user_id = $request->user_id;
            $join->team_id = $request->team_id;
            $join->token = $token;
        $join->save();

        $player = User::find($request->user_id);
        $captain = Team::find($request->team_id)->captain();

        Mail::to($captain)->send(new JoinTeam($player, $join->id, $token));

        flash('Your demand has been sent to the captain team, you will receive a mail when his decision will be made.')->success()->important();
        return redirect()->back();
    }

    public function answer(JoinRequest $joinrequest, $answer, $token)
    {
        if ($answer == "accept") 
        {
            $joinrequest->status = "accepted";
            $joinrequest->save();

            $team = Team::find($joinrequest->team_id);
            $team->players()->attach($joinrequest->user_id);

            flash('The player has been added !')->success()->important();
            return redirect('teams/'. $joinrequest->team_id);
        }
        else
        {
            $joinrequest->status = "refused";
            $joinrequest->save();

            flash('The request of the player has been successfully refused !')->success()->important();
            return redirect('teams/'. $joinrequest->team_id);
        }
    }

}
