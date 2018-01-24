<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = DB::table('equipe')->get();
        $joueurs = DB::table('users')->get();
        return view('joueurs')->with('equipes', $equipes)->with('joueurs', $joueurs);
    }
}
