<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\User;
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
            return view('profil.profil')->with('profil', $profil);
        }

        // Si l'id n'est pas celui de la personne connectée
        $pseudo = DB::table('users')->where('id', $id)->value('pseudo');
        return redirect('joueurs/'. $pseudo);    
    }

    public function getEdit($id)
    {
        $profil = DB::table('users')->where('id', $id)->first();
        return view('profil.edit')->with('profil', $profil);
    }
    

    public function postEdit(UserRequest $request)
    {
        $user = new User;

        /* $user->nom = Auth::user()->nom;
        $user->prenom = Auth::user()->prenom;
        $user->email = Auth::user()->email;
        $user->date_naissance = Auth::user()->date_naissance; */

        $user->pseudo = $request->input('pseudo');
        $user->ville = $request->input('ville');

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['pseudo' => $user->pseudo, 'ville' => $user->ville]);

        flash('Votre compte a bien été mis à jour !')->success()->important();
        return redirect('profil/'. Auth::id());

    }
}
