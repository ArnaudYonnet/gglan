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
    public function index($id_public)
    {
        $info = new InfoController($id_public);
        if (Auth::check()) 
        {
            $profil = DB::table('users')
                      ->where('id_public', $id_public)
                      ->first();
    
            $rank = $info->getRank();
            $equipe = $info->getEquipe();
      
            if ($profil->id == Auth::id()) 
            {
                // Si l'id est celui de la personne connectée
                return view('profil.profil')
                        ->with('profil', $profil)
                        ->with('equipe', $equipe)
                        ->with('rank', $rank);
            }
            
            // Si l'id n'est pas celui de la personne connectée
            $pseudo = DB::table('users')->where('id', $info->getId())->value('pseudo');
            return redirect('joueurs/'. $pseudo);  
        }

        return redirect()->route('login');
    }

    public function getEdit($id_public)
    {
        $info = new InfoController($id_public);

        $profil = DB::table('users')->where('id_public', $id_public)->first();
        $rank = $info->getRank();
        $equipe = $info->getEquipe();
        $ranks = DB::table('rank')->get();
        $jeu = DB::table('jeu')->where('nom', "CS:GO")->first();

        return view('profil.profil')
                ->with('profil', $profil)
                ->with('equipe', $equipe)
                ->with('rank', $rank)
                ->with('jeu', $jeu)
                ->with('ranks', $ranks)
                ->with('edit', 1);

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
        return redirect('profil/'. Auth::user()->id_public);

    }
}
