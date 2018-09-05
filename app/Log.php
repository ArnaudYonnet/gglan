<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'team_id', 'ip',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
