<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class JoueurController extends Controller
{
    public function index()
    {
        $joueurs = DB::table('users')->get();
        $equipes = DB::table('appartenance')
                         ->join('equipe', 'appartenance.id_equipe', '=', 'equipe.id')
                         ->get();
        $ranks = DB::table('entrainement')
                 ->join('rank', 'rank.id', '=', 'entrainement.id_rank')
                 ->get();


        return view('joueur.joueurs')->with('joueurs', $joueurs)->with('equipes', $equipes)->with('ranks', $ranks);
    }

    public function profil($pseudo)
    {
        $infoJoueur = new InfoController("", $pseudo);
        $joueur = DB::table('users')->where('pseudo', $pseudo)->first();

        $rank = $infoJoueur->getRank();
        $equipe = $infoJoueur->getEquipe();
        if (Auth::check()) 
        {
    
            if ($joueur->pseudo != Auth::user()->pseudo) 
            {
                // Si le pseudo n'est pas celui de la personne connectée
                return view('joueur.profil')->with('joueur', $joueur)->with('equipe', $equipe)->with('rank', $rank);
            }

            // Si le pseudo est celui la personne connectée
            $id = DB::table('users')->where('pseudo', $pseudo)->value('id');
            return redirect('profil/'. $id);  
        }
        else
        {
            return view('joueur.profil')->with('joueur', $joueur)->with('equipe', $equipe)->with('rank', $rank);
        }
    }


}
