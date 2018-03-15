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
            $rank = \App\Entrainement::where('id_user', $this->id)->firstOrFail();
        }
        catch (\Exception $e)
        {
            return false;
        }
        
        return $rank;
    }
}
