<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Presenters\UserPresenter;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Rank;
use App\JoinRequest;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'pseudo', 'birth_date', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new UserPresenter($this);
    }

    public function joinrequests()
    {
        return $this->hasMany('App\JoinRequest');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game');
    }

    public function ranks()
    {
        return DB::table('game_user')->where('user_id', $this->id)->get();
    }

    public function getRank($game)
    {
        return Rank::find(DB::table('game_user')->where('user_id', $this->id)->where('game_id', $game)->value('rank_id'));
    }

    public function joinRequest($team)
    {
        return JoinRequest::where('user_id', $this->id)
            ->where('team_id', $team)
            ->first();
    }

    public function hasTeamWithGame($game_id)
    {
        foreach ($this->teams as $team) {
            if ($team->game->id == $game_id) {
                return $team;
            }
        }
        return false;
    }
}
