<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\RankPresenter;

class Rank extends Model
{
    protected $table = "ranks";
    public $timestamps = false;

    public function getUrlAttribute()
    {
        return new RankPresenter($this);
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
