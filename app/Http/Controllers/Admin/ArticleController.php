<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
        $articles = Article::all();

        return view('admin.articles.index')
                ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
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

        swal()->autoclose('2000')->success('Mise à jour',"L'article à bien été écrit !",[]);
        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('admin.articles.show')
                ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('admin.articles.edit')
                ->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_article)
    {
        $article = Article::find($id_article);
            $article->titre_article = $request->input('titre');
            $article->contenu_article = $request->input('contenu');
            $article->image_article = $request->input('image');
        $article->save();

        swal()->autoclose('2000')->success('Mise à jour',"L'article a bien été mis à jour !",[]);
        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_article)
    {
        Article::destroy($id_article);

        swal()->autoclose('2000')->success('Mise à jour',"L'article a bien été supprimé !",[]);
        return redirect('admin/articles');
    }
}
