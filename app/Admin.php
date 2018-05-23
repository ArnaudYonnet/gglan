<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Presenters\AdminPresenter;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUrlAttribute()
    {
        return new AdminPresenter($this);
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function meetings()
    {
        return $this->hasMany('App\Meeting');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
