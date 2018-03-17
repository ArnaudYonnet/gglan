<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Participation;

class Tournois extends Model
{
    protected $table = "tournois";
    public $timestamps = false;

    public static function getTournois()
    {
        $tournois = Tournois::where('status', 'ouvert')->get();
        return $tournois;
    }


    public function getInscrits()
    {
        $inscrits = Participation::where('id_tournois', $this->id)->get();
        return $inscrits;
    }


    public function isInscrit($id_equipe)
    {
        try
        {
            $inscrit = Participation::where('id_tournois', $this->id)
                                    ->where('id_equipe', $id_equipe)
                                    ->firstOrFail();
            return $inscrit;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

}
