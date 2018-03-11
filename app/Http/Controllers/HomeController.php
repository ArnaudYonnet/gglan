<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $articles = \App\Article::orderBy('id', 'desc')
                            ->take(4)
                            ->get();

        $partenaires = DB::table('partenaire')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();

        return view('home')
                ->with('partenaires', $partenaires)
                ->with('articles', $articles)
                ->with('tournois', $tournois);
    }

    public function reglement()
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();

        return view('reglement')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois);
    }

    public function infos()
    {
        $partenaires = DB::table('partenaire')->get();
        $tournois = DB::table('tournois')->where('status', '=', 'ouvert')->first();

        return view('infos')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois);
    }
}
