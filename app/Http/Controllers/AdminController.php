<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TournoisRequest;
use App\Tournois;
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

    
    /*
    |--------------------------------------------------------------------------
    | Tournois
    |--------------------------------------------------------------------------
    */
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
                $jeu_tournois = array();
                foreach ($tournois as $tournoi) 
                {
                    $jeu = DB::table('jeu')
                            ->where('id', $tournoi->id_jeu)
                            ->value('nom');
                    array_push($jeu_tournois, $jeu);
                }
                return view('admin.tournois.tournois')
                        ->with('joueurs', $joueurs)
                        ->with('tournois', $tournois)
                        ->with('jeu_tournois', $jeu_tournois);
            }
        }
        return redirect('/');
    }


    public function getTournois()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $joueurs = DB::table('users')->where('admin', 0)->get();
                $jeux = DB::table('jeu')->get();
                return view('admin.tournois.create')
                        ->with('joueurs', $joueurs)
                        ->with('jeux', $jeux);
            }
        }
        return redirect('/');
    }


    public function postTournois(TournoisRequest $request)
    {
        $tournois = new Tournois;

        $tournois->nom = $request->input('nom');
        $tournois->date_deb = $request->input('date_deb');
        $tournois->date_fin = $request->input('date_fin');
        $tournois->description = $request->input('description');
        $tournois->status = $request->input('status');

        $tournois->save();

        $lastTournois = DB::table('tournois')
                        ->orderBy('id', 'desc')
                        ->value('id');

        DB::table('selection')->insert([
            'id_jeu' => $request->input('id_jeu'),
            'id_tournois' => $lastTournois,
        ]);
        
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
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $joueurs = DB::table('users')->where('admin', 0)->get();
                $tournois = DB::table('tournois')
                            ->join('selection', 'selection.id_tournois', '=', 'tournois.id')
                            ->where('id', $id_tournois)
                            ->first();
                $jeu_tournois = DB::table('jeu')
                                ->where('id', $tournois->id_jeu)
                                ->first();
                $jeux = DB::table('jeu')->get();

                return view('admin.tournois.edit')
                        ->with('joueurs', $joueurs)
                        ->with('tournois', $tournois)
                        ->with('jeu_tournois', $jeu_tournois)
                        ->with('jeux', $jeux)
                        ->with('edit', 1);
            }
        }
        return redirect('/');
    }

    public function postEditTournois(TournoisRequest $request)
    {
        $tournois = new Tournois;

        $tournois->nom = $request->input('nom');
        $tournois->date_deb = $request->input('date_deb');
        $tournois->date_fin = $request->input('date_fin');
        $tournois->description = $request->input('description');
        $tournois->status = $request->input('status');

        DB::table('tournois')
        ->where('id', $request->input('id_tournois'))
        ->update([
            'nom' => $tournois->nom,
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



    /*
    |--------------------------------------------------------------------------
    | Joueurs
    |--------------------------------------------------------------------------
    */
    public function deleteJoueur($id_joueur)
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
    | Jeux
    |--------------------------------------------------------------------------
    */




    /*
    |--------------------------------------------------------------------------
    | Equipes
    |--------------------------------------------------------------------------
    */


}
