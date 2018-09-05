<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'team_id', 'ip',
    ];

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
