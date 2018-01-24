<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    //Recupère l'id de la session de l'utilisateur
    public function index($id)
    {
        $profil = DB::table('users')->where('id', $id)->first();
        return view('profil')->with('profil', $profil);
    }
}
