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
        return view('joueurs')->with('joueurs', $joueurs);
    }

    public function profil($pseudo)
    {
        $joueur = DB::table('users')->where('pseudo', $pseudo)->first();

        if ($joueur->pseudo != Auth::user()->pseudo) 
        {
            // Si le pseudo n'est pas celui de la personne connectée
            return view('profil')->with('joueur', $joueur);
        }
        else 
        {
            // Si le pseudo est celui la personne connectée
            $id = DB::table('users')->where('pseudo', $pseudo)->value('id');
            return redirect('profil/'. $id);  
            
        }
    }


}
