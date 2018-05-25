<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\PostPresenter;

class Post extends Model
{
    protected $table = "posts";
    public $timestamps = true;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new PostPresenter($this);
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
