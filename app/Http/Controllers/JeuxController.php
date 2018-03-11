<?php

namespace App\Http\Controllers;

use App\Jeux;
use Illuminate\Http\Request;

class JeuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = new AdminController();

        $jeux = Jeux::all();

        return view('admin.jeux.jeux')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('jeux', $jeux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = new AdminController();

        return view('admin.jeux.new')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jeu = New Jeux;

        $jeu->nom = $request->input('nom');
        $jeu->description = $request->input('description');
        $jeu->nb_jeu = $request->input('nb_jeu');

        $jeu->save();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le jeu à bien été ajouté !',[]);
        return redirect('admin/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jeux  $jeux
     * @return \Illuminate\Http\Response
     */
    public function show(Jeux $jeux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jeux  $jeux
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jeux)
    {
        $jeu = Jeux::find($id_jeux);

        $info = new AdminController();

        return view('admin.jeux.edit')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('jeu', $jeu);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jeux  $jeux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jeux)
    {
        $jeu = Jeux::find($id_jeux);
        
        $jeu->nom = $request->input('nom');
        $jeu->description = $request->input('description');
        $jeu->nb_jeu = $request->input('nb_jeu');

        $jeu->save();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le jeu à bien été ajouté !',[]);
        return redirect('admin/jeux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jeux  $jeux
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jeux)
    {
        Jeux::destroy($id_jeux);

        swal()->autoclose('2000')
              ->success('Mise à jour','Le jeu à bien été supprimé !',[]);
        return redirect('admin/jeux');
    }
}
