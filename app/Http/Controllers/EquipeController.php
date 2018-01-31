<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipeRequest;
use App\Http\Requests\AppartenanceRequest;
use Illuminate\Support\Facades\DB;
use Softon\SweetAlert\Facades\SWAL; 
use App\Equipe;
use App\Appartenance;
use Auth;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = DB::table('equipe')->get();
        $joueurs = DB::table('users')
                   ->join('appartenance', 'users.id', '=', 'appartenance.id_user')
                   ->get();

        return view('equipe.equipes')->with('equipes', $equipes)->with('joueurs', $joueurs);
    }

    public function getEquipe()
    {
        $jeux = DB::table('jeu')->get();
        return view('equipe.new')->with('jeux', $jeux);

    }

    public function profilEquipe($id)
    {
        $equipe = DB::table('equipe')
                  ->where('id', $id)->first();

        $joueurs = DB::table('users')
                   ->join('appartenance', 'users.id', '=', 'appartenance.id_user')
                   ->where('appartenance.id_equipe', $id)
                   ->get();
        return view('equipe.profil')->with('equipe', $equipe)->with('joueurs', $joueurs);
    }

    public function postEquipe(EquipeRequest $request)
    {
        $equipe = new Equipe;

        $equipe->nom = $request->input('nom');
        $equipe->id_capitaine = Auth::id();
        $equipe->id_jeu = $request->input('jeu');

        $equipe->save();

        $id_equipe = DB::table('equipe')
                    ->where('nom', $request->input('nom'))
                    ->where('id_capitaine', Auth::id())
                    ->value('id');

        DB::table('appartenance')->insert([
            'id_equipe' => $id_equipe,
            'id_user' => Auth::id(),
        ]);

        // flash('Votre équipe a bien été créer !')->success();
        swal()->autoclose(2000)->success('Mise à jour','Votre équipe a bien été créer !',[]);
        return redirect('/equipes');
    }

    public function getEquipier($id)
    {
        $equipe = DB::table('equipe')
                  ->where('id', $id)->first();
        $joueurs = DB::table('users')
                   ->join('appartenance', 'users.id', '=', 'appartenance.id_user')
                   ->where('appartenance.id_equipe', $id)
                   ->get();
                   
        return view('equipe.profil')->with('equipe', $equipe)->with('joueurs', $joueurs)->with('add', 1);
    }

    public function postEquipier(AppartenanceRequest $request)
    {
        $joueurs = DB::table('appartenance')->where('id_equipe', $request->id_equipe)->get();
        $nb_joueurs = count($joueurs);

        if ($nb_joueurs < 5) 
        {
            $joueur = new Appartenance;
            $joueur->id_user = $request->id_user;
            $joueur->id_equipe = $request->id_equipe;

            $joueur->save();
            
            swal()->autoclose(2000)->success('Mise à jour','Votre équipe a bien été mise à jour !',[]);
            return redirect('equipes/'.$request->id_equipe.'/profil');
        }


        swal()->button('Ok, pardon')->error('Limite de 5 joueurs',"Alors comme ça tu veux nous l'a faire à l'envers ? ",[]);
        return redirect('equipes/'.$request->id_equipe.'/profil');
    }
}