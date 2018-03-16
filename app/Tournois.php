<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournois extends Model
{
    protected $table = "tournois";
    public $timestamps = false;

    public static function getTournois()
    {
        $tournois = Tournois::where('status', 'ouvert')->get();
        return $tournois;
    }

}
