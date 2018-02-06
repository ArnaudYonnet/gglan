<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InfoController extends Controller
{
    public $id_user;
    public $pseudo;

    public function __construct($id_public, $pseudo="")
    {
        $this->id_user = $id_public;
        $this->pseudo = $pseudo;

        if ($this->id_user) 
        {
            $this->id_user = $this->getId($id_public, 'id');
        }
        else
        {
            $this->id_user = $this->getId($this->pseudo, 'pseudo');
        }

        
    }
    
    public function getRank()
    {
        $entrainement = DB::table('entrainement')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                          ->from('users')
                          ->whereRaw('users.id = entrainement.id_user');
                })
                ->where('id_user', $this->id_user)
                ->first();

        if ($entrainement) 
        {
            $rank = DB::table('rank')
                    ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                              ->from('entrainement')
                              ->whereRaw('entrainement.id_rank = rank.id');
                    })
                    ->where('id', $entrainement->id_rank)
                    ->first();
        }
        else 
        {
            $rank = null;
        }

        return $rank;
    }

    public function getEquipe()
    {
        $appartenance = DB::table('appartenance')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                          ->from('users')
                          ->whereRaw('users.id = appartenance.id_user');
                })
                ->where('id_user', $this->id_user)
                ->first();

        if ($appartenance) 
        {
            $equipe = DB::table('equipe')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                          ->from('appartenance')
                          ->whereRaw('appartenance.id_equipe = equipe.id');
                })
                ->where('id', $appartenance->id_equipe)
                ->first();
        }
        else 
        {
            $equipe = null;
        }

        return $equipe;
    }
    
    private function getId($info, $mode)
    {
        if ($mode == 'id') 
        {
            $user = DB::table('users')
                    ->where('id_public', $info)
                    ->first();
            return $user->id;
        }

        if ($mode == 'pseudo') 
        {
            $user = DB::table('users')
                    ->where('pseudo', $info)
                    ->first();
            return $user->id;
        }
    }
}