<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TournoisRequest;
use App\Tournois;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ArticlesRequest;
use App\Http\Requests\PartenairesRequest;

use App\Articles;
use App\Partenaires;
use App\User;
use Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $info = new InfoController();
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        // $joueurs = DB::table('users')->where('admin', 0)->get();
        // $equipes = DB::table('equipe')->get();
        $equipiers = array();
        $inscritsTournois = array();
        foreach ($equipes as $equipe) 
        {
            // Recuperer dans la table 'appartenance' tout les joueurs ayant l'id de l'équipe
            // Compter le nombre de résultat
            // Indexer dans un tableau de resultat: "id_equipe" => resultat
            $equipier = DB::table('appartenance')->where('id_equipe', $equipe->id)->get();
            $inscritTournois = $info->inNextTournois($equipe->id);
            
            array_push($inscritsTournois, $inscritTournois);
            array_push($equipiers, count($equipier));
        }
        return view('admin.index')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('equipiers', $equipiers)
                ->with('inscritsTournois', $inscritsTournois);
    }

    
    /*
    |--------------------------------------------------------------------------
    | Tournois
    |--------------------------------------------------------------------------
    */
    public function tournois()
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $tournois = \App\Tournois::all();

        return view('admin.tournois.tournois')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('tournois', $tournois);
    }


    public function getTournois()
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $jeux = \App\Jeu::all();
        return view('admin.tournois.create')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('jeux', $jeux);
    }


    public function postTournois(TournoisRequest $request)
    {
        $tournois = new Tournois;

        $tournois->nom_tournois = $request->input('nom');
        $tournois->date_deb = $request->input('date_deb');
        $tournois->date_fin = $request->input('date_fin');
        $tournois->description = $request->input('description');
        $tournois->place_equipe = $request->input('place_equipe');
        $tournois->id_jeu = $request->input('id_jeu');
        $tournois->status = $request->input('status');

        $tournois->save();
        
        swal()->autoclose(2000)
              ->success('Mise à jour','Le tournois a bien été créer !',[]);
        return redirect('admin/tournois');
    }


    public function deleteTournois($id_tournois)
    {
        DB::table('tournois')
        ->where('id', $id_tournois)
        ->delete();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le tournois a bien été supprimé !',[]);
        return redirect('admin/tournois');
    }


    public function getEditTournois($id_tournois)
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $tournois = DB::table('tournois')
                    ->join('selection', 'selection.id_tournois', '=', 'tournois.id')
                    ->where('id', $id_tournois)
                    ->first();
        $jeu_tournois = DB::table('jeu')
                        ->where('id', $tournois->id_jeu)
                        ->first();
        $jeux = DB::table('jeu')->get();
        return view('admin.tournois.edit')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('tournois', $tournois)
                ->with('jeu_tournois', $jeu_tournois)
                ->with('jeux', $jeux)
                ->with('edit', 1);
    }


    public function postEditTournois(TournoisRequest $request)
    {
        $tournois = new Tournois;

        $tournois->nom_tournois = $request->input('nom');
        $tournois->date_deb = $request->input('date_deb');
        $tournois->date_fin = $request->input('date_fin');
        $tournois->description = $request->input('description');
        $tournois->status = $request->input('status');

        DB::table('tournois')
        ->where('id', $request->input('id_tournois'))
        ->update([
            'nom_tournois' => $tournois->nom_tournois,
            'date_deb' => $tournois->date_deb,
            'date_fin' => $tournois->date_fin,
            'description' => $tournois->description,
            'status' => $tournois->status,
            ]);

        DB::table('selection')
        ->where('id_tournois', $request->input('id_tournois'))
        ->update(['id_jeu' => $request->input('id_jeu'),]);

        swal()->autoclose('2000')
              ->success('Mise à jour','Le tournois a bien été modifié',[]);
        return redirect('admin/tournois');
    }

    public function listeInscrits()
    {
       $inscrits = $this->infoInscrit()["inscrits"];
       $equipes = $this->infoInscrit()["equipes"];

       $inscrits = DB::table('participation')
                   ->join('equipe', 'equipe.id', '=', 'participation.id_equipe')
                   ->join('tournois', 'tournois.id', '=', 'participation.id_tournois')
                   ->get();

        return view('admin.tournois.inscrits')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('inscrits', $inscrits);

    }


    /*
    |--------------------------------------------------------------------------
    | Joueurs
    |--------------------------------------------------------------------------
    */
    public function joueurs()
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        return view('admin.joueurs.joueurs')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes);
    }


    public function getJoueurs()
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        return view('admin.joueurs.create')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes);
    }


    public function postJoueurs(UserRequest $request)
    {
        User::create([
            'id_public' => $request->input('id_public'),
            'pseudo' => $request->input('pseudo'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'description' => $request->input('description'),
            'date_naissance' => $request->input('date_naissance'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        swal()->autoclose('2000')
              ->success('Mise à jour','Le joueur a bien été crée !',[]);
        return redirect('admin/joueurs');
    }


    public function getEditJoueurs($id_joueur)
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $inscrit = DB::table('users')
                  ->where('id', $id_joueur)
                  ->first();
        return view('admin.joueurs.edit')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('inscrit', $inscrit);
    }


    public function postEditJoueurs(EditUserRequest $request, $id_joueur)
    {
        $joueur = new User;

        $joueur->nom = $request->input('nom');
        $joueur->prenom = $request->input('prenom');
        $joueur->description = $request->input('description');
        $joueur->pseudo = $request->input('pseudo');

        DB::table('users')
        ->where('id', $id_joueur)
        ->update([
            'nom' => $joueur->nom,
            'prenom' => $joueur->prenom,
            'description' => $joueur->description,
            'pseudo' => $joueur->pseudo,
            ]);

        return redirect('admin/joueurs');
    }


    public function deleteJoueurs($id_joueur)
    {
        DB::table('users')
        ->where('id', $id_joueur)
        ->delete();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le joueur a bien été supprimé !',[]);
        return redirect('admin/joueurs');
    }

    
    /*
    |--------------------------------------------------------------------------
    | Equipes
    |--------------------------------------------------------------------------
    */
    public function equipes()
    {
        $info = new InfoController();
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $equipiers = array();
        $inscrits = array();
        foreach ($equipes as $equipe) 
        {
            $equipier = DB::table('appartenance')->where('id_equipe', $equipe->id)->get();
            $inscrit = $info->inNextTournois($equipe->id);
            
            array_push($inscrits, $inscrit);
            array_push($equipiers, count($equipier));
        }
        return view('admin.equipes.equipes')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('equipiers', $equipiers)
                ->with('inscrits', $inscrits);
    }

    /*
    |--------------------------------------------------------------------------
    | Info
    |--------------------------------------------------------------------------
    */
    public function infoInscrit()
    {
        $inscrits = DB::table('users')->where('admin', 0)->get();
        $equipes = DB::table('equipe')->get();

        return array(
            "inscrits" => $inscrits, 
            "equipes" => $equipes
        );
    }
}
