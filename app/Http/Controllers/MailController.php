<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;

// Model
use App\User;

// Mail
use App\Mail\AcceptRequest;
use App\Mail\RefuseRequest;

//Job
use App\Jobs\SendJoinRequest;

class MailController extends Controller
{
    static public function joinrequest($user_id, $team_id)
    {
        SendJoinRequest::dispatch($user_id, $team_id)->delay(Carbon::now()->addSeconds(5));
    }

    static public function accept($user_id)
    {
        $user = User::find($user_id);

        Mail::to($user)->send(new AcceptRequest());
    }

    static public function refuse($user_id)
    {
        $user = User::find($user_id);

        Mail::to($user)->send(new RefuseRequest());
    }
}
