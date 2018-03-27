<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_public', 'pseudo', 'nom', 'prenom', 'date_naissance', 'ville', 'description', 'adresse', 'email', 'password', 'type','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getRank()
    {
        try {
            $entrainement = \App\Models\Entrainement::where('id_user', $this->id)->firstOrFail();
            $rank = \App\Models\Rank::find($entrainement->id_rank);

        }
        catch (\Exception $e)
        {
            return false;
        }
        
        return $rank;
    }

    public function getEquipe()
    {
        try {
            $appartenance = \App\Models\Appartenance::where('id_user', $this->id)->firstOrFail();
            $equipe = \App\Models\Equipe::find($appartenance->id_equipe);
            return $equipe;
        }
        catch (\Exception $e)
        {
            try {
                $capitaine = \App\Models\Equipe::where('id_capitaine', $this->id)->firstOrFail();
                return $capitaine;
            }
            catch (\Exception $e){
            }
        }
        return false;
    }

    static function sansEquipe()
    {
        $joueurs = User::where('type', "Joueur")->get();
        $i=0;
        foreach ($joueurs as $joueur) 
        {
            if (!$joueur->getEquipe()) 
            {
                $i++;
            }
        }
        return $i;
    }

    static function search($pseudo)
    {
        $joueur = User::where('pseudo', 'like', '%'.$pseudo.'%')->get();
        return $joueur;
    }
}
