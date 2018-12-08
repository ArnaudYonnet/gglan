<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentPlace extends Model
{
    protected $table = "tournaments_places";
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tournament_id', 'team_id', 'user_id', 'payed',
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function player()
    {
        return $this->belongsTo('App\User');
    }

    public function tournament()
    {
        return $this->belongsToMany('App\Tournament');
    }
}
