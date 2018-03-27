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
        $ids = \App\Models\Appartenance::where('id_equipe', $this->id)->get();
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

    static function inscrit()
    {
        $equipes = Equipe::all();

        $i=0;
        foreach ($equipes as $equipe) 
        {
            if (\App\Models\Tournois::isInscrit($equipe->id)) 
            {
                $i++;
            }
        }
        return $i;
    }

    static function incomplet()
    {
        $equipes = Equipe::all();

        $i=0;
        foreach ($equipes as $equipe) 
        {
            if (count($equipe->getJoueurs()) != 4) 
            {
                $i++;
            }
        }
        return $i;
    }

    static function non_inscrit()
    {
        $equipes = Equipe::all();

        $i=0;
        foreach ($equipes as $equipe) 
        {
            if (!\App\Models\Tournois::isInscrit($equipe->id)) 
            {
                $i++;
            }
        }
        return $i;
    }

    static function search($nom)
    {
        $equipe = Equipe::where('nom_equipe', 'like', '%'.$nom.'%')->get();
        return $equipe;
    }
}
