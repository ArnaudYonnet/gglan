<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipe extends Model
{
    protected $table = "equipe";
    public $timestamps = false;


    public function getJoueurs()
    {
        $ids = \App\Models\Appartenance::where('id_equipe', $this->id)
                                ->where('id_user', '!=', $this->getCapitaine()->id)
                                ->get();
        $joueurs = array();
        foreach ($ids as $id) 
        {
            $joueur = \App\Models\User::find($id->id_user);
            array_push($joueurs, $joueur);
        }
        return $joueurs;
    }

    public function getCapitaine()
    {        
        return \App\Models\User::where('id', $this->id_capitaine)->first();
    }

    public function getInscription()
    {
        try {

            $inscrit = \App\Models\Participation::where('id_equipe', $this->id)->firstOrFail();
        }
        catch (\Exception $e)
        {
            return false;
        }
        
        return $inscrit;
    }
}
