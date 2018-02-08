<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TournoisController extends Controller
{
    public function index()
    {
        return view('tournois');
    }

    public function inscription($id_equipe)
    {
        $tournois = DB::table('tournois')
                             ->orderBy('id', 'desc')
                             ->first(); 

        DB::table('participation')->insert([
            'id_tournois' => $tournois->id,
            'id_equipe' => $id_equipe,
        ]);
        
        swal()->autoclose(3000)
              ->success('Mise à jour', 'Votre équipe est bien inscrite pour la prochaine GG-LAN !');
        return redirect('equipes/'.$id_equipe.'/profil');
        
    }
}
