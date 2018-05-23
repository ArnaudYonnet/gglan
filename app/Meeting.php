<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\MeetingPresenter;

class Meeting extends Model
{
    protected $table = "meetings";
    public $timestamps = true;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new MeetingPresenter($this);
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
