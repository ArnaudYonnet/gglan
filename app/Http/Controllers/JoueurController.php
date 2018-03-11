<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class JoueurController extends Controller
{
    public function index()
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();
        
        $joueurs = DB::table('users')
                   ->where('type', 'joueur')
                   ->get();
        $equipes = DB::table('appartenance')
                         ->join('equipe', 'appartenance.id_equipe', '=', 'equipe.id')
                         ->get();
        $ranks = DB::table('entrainement')
                 ->join('rank', 'rank.id', '=', 'entrainement.id_rank')
                 ->get();


        return view('joueur.joueurs')
                ->with('partenaires', $partenaires)
                ->with('joueurs', $joueurs)
                ->with('equipes', $equipes)
                ->with('tournois', $tournois)
                ->with('ranks', $ranks);
    }

    public function profil($pseudo)
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();
        
        $info = new InfoController("", $pseudo);
        $joueur = DB::table('users')
                  ->where('pseudo', $pseudo)
                  ->first();

        $rank = $info->getRank();
        $equipe = $info->getEquipe();

        if (Auth::check()) 
        {
    
            if ($joueur->pseudo != Auth::user()->pseudo) 
            {
                // Si le pseudo n'est pas celui de la personne connectée
                return view('joueur.profil')
                        ->with('partenaires', $partenaires)
                        ->with('joueur', $joueur)
                        ->with('equipe', $equipe)
                        ->with('tournois', $tournois)
                        ->with('rank', $rank);
            }

            // Si le pseudo est celui la personne connectée
            $id = DB::table('users')
                  ->where('pseudo', $pseudo)
                  ->value('id_public');
            return redirect('profil/'. $id);  
        }
        else
        {
            return view('joueur.profil')
                    ->with('partenaires', $partenaires)
                    ->with('joueur', $joueur)
                    ->with('equipe', $equipe)
                    ->with('tournois', $tournois)
                    ->with('rank', $rank);
        }
    }


}
