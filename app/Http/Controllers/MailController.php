<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// Model
use App\User;
use App\Team;

// Mail
use App\Mail\JoinRequest;
use App\Mail\AcceptRequest;
use App\Mail\RefuseRequest;

class MailController extends Controller
{
    static public function joinrequest($user_id, $team_id)
    {
        $user = User::find($user_id);
        $team = Team::find($team_id);

        Mail::to($team->captain())->send(new JoinRequest($user, $team));
    }

    static public function acceptrequest($user_id)
    {
        $user = User::find($user_id);

        Mail::to($user)->send(new AcceptRequest());
    }

    static public function refuserequest($user_id)
    {
        $user = User::find($user_id);

        Mail::to($user)->send(new RefuseRequest());
    }
}
