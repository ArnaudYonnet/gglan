<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    protected $table = "join_requests";
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'team_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
}
