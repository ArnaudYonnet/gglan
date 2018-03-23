<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\User;
use \App\Models\Equipe;
use \App\Models\Tournois;
use \App\Models\Jeu;
use \App\Models\Rank;

class HomeController extends Controller
{
    public function index()
    {
        $joueurs = User::where('admin', 0)
                        ->where('type', 'Joueur')
                        ->get();
        $equipes = Equipe::all();
        $tournois = Tournois::all();
        $jeux = Jeu::all();
        $ranks = Rank::all();
        return view('admin.index')
               ->with('joueurs', $joueurs)
               ->with('equipes', $equipes)
               ->with('tournois', $tournois)
               ->with('jeux', $jeux)
               ->with('ranks', $ranks);
    }
}
