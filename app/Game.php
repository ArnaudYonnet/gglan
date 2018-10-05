<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\GamePresenter;

class Game extends Model
{
    protected $table = "games";
    public $timestamps = false;

    protected $appends = [
        'url'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'players_team',
    ];

    public function getUrlAttribute()
    {
        return new GamePresenter($this);
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function ranks()
    {
        return $this->hasMany('App\Rank');
    }

    // public function tournaments()
    // {
    //     return $this->hasMany('App\Tournament');
    // }
}
