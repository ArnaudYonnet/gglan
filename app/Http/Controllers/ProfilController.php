<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProfilController extends Controller
{
    //Recupère l'id de la session de l'utilisateur
    public function index($id)
    {
        $profil = DB::table('users')->where('id', $id)->first();
        if ($profil->id == Auth::id()) 
        {
            // Si l'id est celui de la personne connectée
            return view('profil')->with('profil', $profil);
        }
        else 
        {
            // Si l'id n'est pas celui de la personne connectée
            $pseudo = DB::table('users')->where('id', $id)->value('pseudo');
            return redirect('joueurs/'. $pseudo);    
        }
        
    }
}
