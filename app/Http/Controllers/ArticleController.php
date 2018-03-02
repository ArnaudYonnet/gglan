<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function readArticle($id_article)
    {
        $partenaires = DB::table('partenaires')->get();
        
        $article = DB::table('article')
                   ->where('id_article', $id_article)
                   ->first();
        return view('articles.read')
                ->with('partenaires', $partenaires)
                ->with('article', $article);
    }
}
