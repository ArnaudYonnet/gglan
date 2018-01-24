<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoueurController extends Controller
{
    public function index()
    {
        $joueurs = DB::table('users')->get();
        return view('joueurs')->with('joueurs', $joueurs);
    }
}
