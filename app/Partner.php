<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\PartnerPresenter;

class Partner extends Model
{
    protected $table = "partners";
    public $timestamps = true;

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new PartnerPresenter($this);
    }
}
