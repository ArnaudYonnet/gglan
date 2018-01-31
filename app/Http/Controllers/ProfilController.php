<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\User;
use Auth;
use Softon\SweetAlert\Facades\SWAL; 

class ProfilController extends Controller
{
    //Recupère l'id de la session de l'utilisateur
    public function index($id)
    {
        $profil = DB::table('users')
                  ->where('id', $id)
                  ->first();
        //        
        $entrainement = DB::table('entrainement')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                          ->from('users')
                          ->whereRaw('users.id = entrainement.id_user');
                })
                ->where('id_user', $id)
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


        $appartenance = DB::table('appartenance')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                          ->from('users')
                          ->whereRaw('users.id = appartenance.id_user');
                })
                ->where('id_user', $id)
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
  
        if ($profil->id == Auth::id()) 
        {
            // Si l'id est celui de la personne connectée
            return view('profil.profil')->with('profil', $profil)->with('equipe', $equipe)->with('rank', $rank);
        }
        
        // Si l'id n'est pas celui de la personne connectée
        $pseudo = DB::table('users')->where('id', $id)->value('pseudo');
        return redirect('joueurs/'. $pseudo);  
    }

    public function getEdit($id)
    {
        $profil = DB::table('users')->where('id', $id)->first();
        $ranks = DB::table('rank')->get();
        $jeu = DB::table('jeu')->where('nom', "CS:GO")->first();
        return view('profil.edit')->with('profil', $profil)->with('ranks', $ranks)->with('jeu', $jeu);

        // Recup id_jeu dans rank et l'insert dans entrainement
    }
    
    public function postEdit(UserRequest $request)
    {
        $user = new User;

        $user->pseudo = $request->input('pseudo');
        $user->ville = $request->input('ville');

        $user->id_jeu = $request->input('id_jeu');
        $user->rank = $request->input('rank');

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['pseudo' => $user->pseudo, 'ville' => $user->ville]);

        
        $entrainement = DB::table('entrainement')
                        ->whereExists(function ($query) {
                            $query->select(DB::raw(1))
                                  ->from('users')
                                  ->whereRaw('entrainement.id_user = users.id');
                        })
                        ->where('id_user', Auth::id())
                        ->first();

        if ($entrainement) 
        {
            DB::table('entrainement')
            ->where('id_user', Auth::id())
            ->update(['id_rank' => $user->rank]);
        }
        else 
        {
            DB::table('entrainement')->insert([
                'id_jeu' => $user->id_jeu,
                'id_user' => Auth::id(),
                'id_rank' => $user->rank,
            ]);
        }

        // flash('Votre compte a bien été mis à jour !')->success();
        swal()->autoclose(2000)->success('Mise à jour','Votre compte a bien été mis à jour !',[]);
        return redirect('profil/'. Auth::id());

    }
}
