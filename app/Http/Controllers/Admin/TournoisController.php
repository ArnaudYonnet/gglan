<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Tournois;
use App\Models\Participation;
use Illuminate\Http\Request;

class TournoisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournois = Tournois::all();
        $jeux = \App\Models\Jeu::all();

        return view('admin.tournois.index')
               ->with('jeux', $jeux)
               ->with('tournois', $tournois);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function show(Tournois $tournois)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournois $tournois)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id_tournois, $id_equipe)
    {
        if (!Tournois::isInscrit($id_equipe)) 
        {
            $participation = New Participation;
                $participation->id_equipe = $id_equipe;
                $participation->id_tournois = $id_tournois;
            $participation->save();

            swal()->autoclose('2000')
              ->success('Mise à jour','Votre équipe est bien inscrite pour '. Tournois::find($id_tournois)->nom_tournois   ,[]);
            return redirect('tournois');
        }
        swal()->autoclose('2000')
              ->error('Erreur', 'Votre équipe est déjà inscrite pour un tournois...', []);
        return redirect('tournois');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tournois, $id_equipe)
    {
        $participation = Participation::where('id_tournois', $id_tournois)
                                      ->where('id_equipe', $id_equipe)
                                      ->delete();
        swal()->autoclose('2000')
              ->success('Mise à jour','Votre équipe est bien désinscrite du tournois !',[]);
        return redirect('tournois');
    }
}
