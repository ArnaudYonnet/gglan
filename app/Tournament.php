<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\TournamentPresenter;

class Tournament extends Model
{
    protected $table = "tournaments";
    public $timestamps = false;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new TournamentPresenter($this);
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function isFull()
    {
        return ($this->teams->count() == $this->teams_place) ? true : false;
    }
}
