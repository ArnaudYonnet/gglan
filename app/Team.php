<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\TeamPresenter;
use App\User;

class Team extends Model
{
    protected $table = "teams";
    public $timestamps = true;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new TeamPresenter($this);
    }

    public function captain()
    {
        return User::find($this->user_id);
    }

    public function players()
    {
        return $this->belongsToMany('App\User');
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament');
    }

    public function joinrequests()
    {
        return $this->hasMany('App\JoinRequest');
    }

    public function isSubscribeTournament($tournament_id)
    {
        foreach ($this->tournaments as $tournament) 
        {
            if ($tournament->id == $tournament_id) 
            {
                return true;
            }
        }
        return false;
    }

}
