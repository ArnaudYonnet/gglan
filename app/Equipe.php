<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = "equipe";
    public $timestamps = false;


    public function getJoueurs()
    {
        try {
            $ids = \App\Appartenance::where('id_equipe', $this->id)
                                    ->where('id_user', '!=', $this->getCapitaine()->id)
                                    ->get();

            $joueurs = array();
            foreach ($ids as $id) 
            {
                $joueur = \App\User::find($id->id_user);
                array_push($joueurs, $joueur);
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
        
        return $joueurs;
    }

    public function getCapitaine()
    {
        try {
            $capitaine = \App\User::where('id', $this->id_capitaine)->first();
        }
        catch (\Exception $e)
        {
            return false;
        }
        
        return $capitaine;
    }
}
