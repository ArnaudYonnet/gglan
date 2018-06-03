<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class LogController extends Controller
{
    public static function logCreateTeam(Team $team)
    {
        $path = 'team.txt';

        $file = file_get_contents($path);

        $log = 
            "ID:". $team->id.
            "|Name: ". $team->name.
            "| IP of creator: ". LogController::getIp(). "\n\r";

        file_put_contents($path, $log, FILE_APPEND | LOCK_EX);
    }

    public static function getIp() 
    {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) 
        {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        // Sinon : IP normale
        else 
        {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }
}


// $_SERVER['REMOTE_ADDR']
