<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Participation;

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


    public static function isInscrit($id_equipe)
    {
        try
        {
            $inscrit = Participation::where('id_equipe', $id_equipe)
                                    ->firstOrFail();
            return $inscrit;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    static function equipes_inscrites($id_tournois)
    {
        $equipes = Participation::where('id_tournois', $id_tournois)->get();

        return count($equipes);
    }

}
