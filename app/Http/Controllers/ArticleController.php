<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $info = new AdminController();

                $articles = Article::all();

                return view('admin.articles.index')
                        ->with('inscrits', $info->infoInscrit()["inscrits"])
                        ->with('equipes', $info->infoInscrit()["equipes"])
                        ->with('articles', $articles);
            }
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $info = new AdminController();

                return view('admin.articles.create')
                        ->with('inscrits', $info->infoInscrit()["inscrits"])
                        ->with('equipes', $info->infoInscrit()["equipes"]);
            }
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        
        $article->date_article = \Carbon\Carbon::now()->format('Y-m-d');
        $article->titre_article = $request->input('titre');
        $article->contenu_article = $request->input('contenu');
        $article->image_article = $request->input('image');
        $article->id_user = Auth::id();

        $article->save();

        swal()->autoclose('2000')
              ->success('Mise à jour',"L'article à bien été écrit !",[]);
        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $info = new AdminController();
                $article = Article::find($article->id);

                return view('admin.articles.show')
                        ->with('inscrits', $info->infoInscrit()["inscrits"])
                        ->with('equipes', $info->infoInscrit()["equipes"])
                        ->with('article', $article);
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showHome($id_article)
    {
        $article = Article::find($id_article);
        $partenaires = DB::table('partenaire')->get();

        return view('articles.show')
                ->with('partenaires', $partenaires)
                ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $info = new AdminController();
                $article = Article::find($article->id);

                return view('admin.articles.edit')
                        ->with('inscrits', $info->infoInscrit()["inscrits"])
                        ->with('equipes', $info->infoInscrit()["equipes"])
                        ->with('article', $article);
            }
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_article)
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                $article = Article::find($id_article);
                
                $article->titre_article = $request->input('titre');
                $article->contenu_article = $request->input('contenu');

                $article->save();

                swal()->autoclose('2000')
                    ->success('Mise à jour',"L'article a bien été supprimé !",[]);
                return redirect('admin/articles');
            }
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_article)
    {
        if (Auth::check()) 
        {
            if (Auth::user()->admin) 
            {
                Article::destroy($id_article);

                swal()->autoclose('2000')
                    ->success('Mise à jour',"L'article a bien été supprimé !",[]);
                return redirect('admin/articles');
            }
        }
        return redirect('/');
    }
}
