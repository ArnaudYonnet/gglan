<?php

namespace App;

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
            $entrainement = \App\Entrainement::where('id_user', $this->id)->firstOrFail();
            $rank = \App\Rank::find($entrainement->id_rank);

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
            $appartenance = \App\Appartenance::where('id_user', $this->id)->firstOrFail();
            $equipe = \App\Equipe::find($appartenance->id_equipe);
            return $equipe;
        }
        catch (\Exception $e)
        {
            try {
                $capitaine = \App\Equipe::where('id_capitaine', $this->id)->firstOrFail();
                return $capitaine;
            }
            catch (\Exception $e){
            }
        }
        return false;
    }

    
}
