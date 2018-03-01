<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TournoisRequest;
use App\Tournois;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ArticlesRequest;
use App\Articles;
use App\User;
use Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
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
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];
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
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes)
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
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];
                $jeux = DB::table('jeu')->get();
                return view('admin.tournois.create')
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes)
                        ->with('jeux', $jeux);
            }
        }
        return redirect('/');
    }


    public function postTournois(TournoisRequest $request)
    {
        $tournois = new Tournois;

        $tournois->nom_tournois = $request->input('nom');
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
        }
        return redirect('/');
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
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];
                return view('admin.joueurs.joueurs')
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes);
            }
        }
        return redirect('/');
    }


    public function getJoueurs()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];
                return view('admin.joueurs.create')
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes);
            }
        }
        return redirect('/');
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
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
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
        }
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
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
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
        }
        return redirect('/');
    }


    public function deleteEquipe($id_equipe)
    {

        DB::table('equipe')
        ->where('id', $id_equipe)
        ->delete();

        swal()->autoclose('2000')
              ->success('Mise à jour',"L'équipe a bien été supprimé !",[]);
        return redirect('admin/equipes');
    }


    /*
    |--------------------------------------------------------------------------
    | Articles
    |--------------------------------------------------------------------------
    */
    public function articles()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];

                $articles = DB::table('article')
                            ->join('users', 'users.id', '=', 'article.id_user')
                            ->get();

                return view('admin.articles.articles')
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes)
                        ->with('articles', $articles);
            }
        }
        return redirect('/');
    }

    public function getArticles()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $inscrits = $this->infoInscrit()["inscrits"];
                $equipes = $this->infoInscrit()["equipes"];

                return view('admin.articles.new')
                        ->with('inscrits', $inscrits)
                        ->with('equipes', $equipes);
            }
        }
        return redirect('/');
    }

    public function postArticles(ArticlesRequest $request)
    {
        $article = new Articles;
        
        $article->date_article = Carbon::now()->format('Y-m-d');
        $article->titre_article = $request->input('titre');
        $article->contenu_article = $request->input('contenu');
        $article->id_user = Auth::id();

        $article->save();

        swal()->autoclose('2000')
              ->success('Mise à jour',"L'article à bien été écrit !",[]);
        return redirect('admin/articles');
    }

    public function deleteArticle($id_article)
    {
        DB::table('article')
        ->where('id_article', $id_article)
        ->delete();

        swal()->autoclose('2000')
              ->success('Mise à jour',"L'article a bien été supprimé !",[]);
        return redirect('admin/articles');
    }

    public function getEditArticle($id_article)
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];
        $article = DB::table('article')
                  ->where('id_article', $id_article)
                  ->first();

        return view('admin.articles.edit')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('article', $article);
    }
    
    public function postEditArticle(ArticlesRequest $request, $id_article)
    {
        $article = new Articles;

        $article->titre_article = $request->input('titre');
        $article->contenu_article = $request->input('contenu');

        DB::table('article')
        ->where('id_article', $id_article)
        ->update([
            'titre_article' => $article->titre_article,
            'contenu_article' => $article->contenu_article,
            ]);
        
        swal()->autoclose('2000')
              ->success('Mise à jour',"L'article à bien été modifié !",[]);
        return redirect('admin/articles');
    }

    public function previewArticle($id_article)
    {
        $inscrits = $this->infoInscrit()["inscrits"];
        $equipes = $this->infoInscrit()["equipes"];

        $article = DB::table('article')
                  ->where('id_article', $id_article)
                  ->first();

        return view('admin.articles.preview')
                ->with('inscrits', $inscrits)
                ->with('equipes', $equipes)
                ->with('article', $article); 
    }


    /*
    |--------------------------------------------------------------------------
    | Jeux
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Info
    |--------------------------------------------------------------------------
    */
    private function infoInscrit()
    {
        $inscrits = DB::table('users')->where('admin', 0)->get();
        $equipes = DB::table('equipe')->get();

        return array(
            "inscrits" => $inscrits, 
            "equipes" => $equipes
        );
    }

}
