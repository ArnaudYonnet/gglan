<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\RolePresenter;

class Role extends Model
{
    protected $table = "roles";
    public $timestamps = false;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new RolePresenter($this);
    }

    public function admins()
    {
        return $this->hasMany('App\Admin');
    }
}
