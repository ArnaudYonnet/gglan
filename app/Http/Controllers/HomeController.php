<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $articles = DB::table('article')->get();
        $partenaires = DB::table('partenaires')->get();

        return view('home')
                ->with('partenaires', $partenaires)
                ->with('articles', $articles);
    }

    public function reglement()
    {
        $partenaires = DB::table('partenaires')->get();

        return view('reglement')
                ->with('partenaires', $partenaires);
    }
}
