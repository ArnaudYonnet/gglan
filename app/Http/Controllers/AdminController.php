<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $joueurs = DB::table('users')->where('admin', 0)->get();
                $equipes = DB::table('equipe')->get();
                $equipiers = array();
                foreach ($equipes as $equipe) 
                {
                    // Recuperer dans la table 'appartenance' tout les joueurs ayant l'id de l'équipe
                    // Compter le nombre de résultat
                    // Indexer dans un tableau de resultat: "id_equipe" => resultat
                    $equipier = DB::table('appartenance')->where('id_equipe', $equipe->id)->get();
                    
                    array_push($equipiers, count($equipier));
                }
                return view('admin.index')
                        ->with('joueurs', $joueurs)
                        ->with('equipes', $equipes)
                        ->with('equipiers', $equipiers);
            }
        }
        return redirect('/');
    }

    public function tournois()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $joueurs = DB::table('users')->where('admin', 0)->get();
                $tournois = DB::table('tournois')
                            ->join('selection', 'selection.id_tournois', '=', 'tournois.id')
                            ->get();
                $jeux = array();
                foreach ($tournois as $tournoi) 
                {
                    $jeu = DB::table('jeu')
                            ->where('id', $tournoi->id_jeu)
                            ->value('nom');
                    array_push($jeux, $jeu);
                }
            }
        }
        return view('admin.tournois.tournois')
                ->with('joueurs', $joueurs)
                ->with('tournois', $tournois)
                ->with('jeux', $jeux);
    }

    public function getTournois()
    {
        $joueurs = DB::table('users')->where('admin', 0)->get();
        $jeux = DB::table('jeu')->get();
        return view('admin.tournois.create')
                ->with('joueurs', $joueurs)
                ->with('jeux', $jeux);
    }
}
