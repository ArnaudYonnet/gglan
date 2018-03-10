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
        $partenaires = DB::table('partenaires')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();
        $equipes = DB::table('equipe')->get();
        $joueurs = DB::table('users')
        ->join('appartenance', 'users.id', '=', 'appartenance.id_user')
        ->get();
        
        return view('equipe.equipes')
                ->with('partenaires', $partenaires)
                ->with('equipes', $equipes)
                ->with('joueurs', $joueurs)
                ->with('tournois', $tournois);
    }

    public function getEquipe()
    {
        if (Auth::check()) 
        {
            $partenaires = DB::table('partenaires')->get();
            $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();
            $info = new InfoController(Auth::user()->id_public);
            $equipe = $info->getEquipe();
            if ($equipe) 
            {
                return redirect('equipes/'.$equipe->id.'/profil');
            }
            $jeux = DB::table('jeu')->get();
            return view('equipe.new')
                    ->with('partenaires', $partenaires)
                    ->with('jeux', $jeux)
                    ->with('tournois', $tournois);
        }
        return redirect()->route('register');
    }

    public function postEquipe(EquipeRequest $request)
    {
        $equipe = new Equipe;

        $equipe->nom_equipe = $request->input('nom');
        $equipe->id_capitaine = Auth::id();
        $equipe->avatar_equipe = $request->input('avatar_equipe');
        $equipe->id_jeu = $request->input('jeu');

        $equipe->save();

        $id_equipe = DB::table('equipe')
                    ->where('nom_equipe', $request->input('nom'))
                    ->where('id_capitaine', Auth::id())
                    ->value('id');

        DB::table('appartenance')->insert([
            'id_equipe' => $id_equipe,
            'id_user' => Auth::id(),
        ]);


        // flash('Votre équipe a bien été créer !')->success();
        swal()->autoclose(2000)
              ->success('Mise à jour','Votre équipe a bien été créer !',[]);
        return redirect('equipes/'. $id_equipe . '/profil');
    }

    public function profilEquipe($id)
    {
        $partenaires = DB::table('partenaires')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();
        
        $ranks = array();
        $equipe = DB::table('equipe')
                  ->where('id', $id)->first();

        $joueurs = DB::table('users')
                   ->join('appartenance', 'users.id', '=', 'appartenance.id_user')
                   ->where('appartenance.id_equipe', $id)
                   ->get();
        
        $next_tournois = DB::table('tournois')
                    ->orderBy('id', 'desc')
                    ->first();

        foreach ($joueurs as $joueur) 
        {
            $info = new InfoController($joueur->id_public);
            array_push($ranks, $info->getRank());
        }
        
        if ($info->inNextTournois($id)) 
        {
            return view('equipe.profil')
                    ->with('partenaires', $partenaires)
                    ->with('equipe', $equipe)
                    ->with('joueurs', $joueurs)
                    ->with('ranks', $ranks)
                    ->with('participe', 1)
                    ->with('tournois', $tournois);
        }

        return view('equipe.profil')
                ->with('partenaires', $partenaires)
                ->with('equipe', $equipe)
                ->with('joueurs', $joueurs)
                ->with('ranks', $ranks)
                ->with('next_tournois', $next_tournois)
                ->with('tournois', $tournois);
    }

    public function postEquipier(AppartenanceRequest $request)
    {
        $joueurs = DB::table('appartenance')->where('id_equipe', $request->id_equipe)->get();
        $nb_joueurs = count($joueurs);

        if ($nb_joueurs < 5) 
        {
            $info = new InfoController($request->id_public);
            if ($info->inEquipe()) 
            {
                swal()->autoclose(3000)
                      ->error('Erreur','Le joueur est déjà dans une équipe !',[]);
                return redirect('equipes/'.$request->id_equipe.'/profil');
            }
            
            if ($info->isJoueur()) 
            {
                $joueur = new Appartenance;
                $joueur->id_user = $info->getId();
                $joueur->id_equipe = $request->id_equipe;
    
                $joueur->save();
                
                swal()->autoclose(2000)
                      ->success('Mise à jour','Votre équipe a bien été mise à jour !',[]);
                return redirect('equipes/'.$request->id_equipe.'/profil');
            }
            else
            {
                swal()->autoclose(2000)
                      ->error('Erreur',"Cette personne n'est pas un joueur",[]);
                return redirect('equipes/'.$request->id_equipe.'/profil');
            }
        }


        swal()->button('Ok, pardon')
              ->error('Limite de 5 joueurs',"Alors comme ça tu veux nous l'a faire à l'envers ? ",[]);
        return redirect('equipes/'.$request->id_equipe.'/profil');
    }

    public function deleteEquipier($id_equipe, $id_user)
    {
        $joueur = DB::table('users')->where('id', $id_user)->first();

        DB::table('appartenance')
        ->where('id_equipe', $id_equipe)
        ->where('id_user', $id_user)
        ->delete();

        swal()->autoclose(2000)
              ->success('Mise à jour', 'Le joueur '. $joueur->pseudo . " a bien été retiré de l'équipe");
        return redirect('equipes/'. $id_equipe . '/profil');
    }
}
