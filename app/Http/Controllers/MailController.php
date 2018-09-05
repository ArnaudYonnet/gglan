<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;

//Job
use App\Jobs\SendJoinRequest;
use App\Jobs\SendAcceptRequest;
use App\Jobs\SendRefuseRequest;

class MailController extends Controller
{
    static public function joinrequest($user_id, $team_id)
    {
        SendJoinRequest::dispatch($user_id, $team_id)->delay(Carbon::now()->addSeconds(5));
    }

    static public function accept($user_id)
    {
        SendAcceptRequest::dispatch($user_id)->delay(Carbon::now()->addSeconds(5));        
    }

    static public function refuse($user_id)
    {
        SendRefuseRequest::dispatch($user_id)->delay(Carbon::now()->addSeconds(5));     
    }
}
