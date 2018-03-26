<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::orderBy('id', 'desc')
                            ->take(4)
                            ->get();

        $partenaires = DB::table('partenaire')->get();
        $tournois = \App\Models\Tournois::getTournois();
        
        return view('home')
                ->with('partenaires', $partenaires)
                ->with('articles', $articles)
                ->with('tournois', $tournois);
    }

    public function reglement()
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = \App\Models\Tournois::getTournois();
        
        return view('reglement')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois);
    }

    public function infos()
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = \App\Models\Tournois::getTournois();
        $info = \App\Models\InfoPratique::find(1);
        
        return view('infos')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois)
                ->with('info', $info);
    }
}
