<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jeu;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::all();

        return view('admin.jeu.index')
                ->with('jeux', $jeux);
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
        $jeu = New Jeu;
            $jeu->nom = $request->input('nom');
            $jeu->description = $request->input('description');
            $jeu->nb_jeu = $request->input('nb_jeu');
        $jeu->save();

        swal()->autoclose('2000')->success('Mise à jour','Le jeu à bien été ajouté !',[]);
        return redirect('admin/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jeu  $jeu
     * @return \Illuminate\Http\Response
     */
    public function show(Jeu $jeu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jeu  $jeu
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jeu)
    {
        $jeu = Jeu::find($id_jeu);

        return view('admin.jeu.edit')
                ->with('jeu', $jeu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jeu  $jeu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jeu)
    {
        $jeu = Jeu::find($id_jeu);
            $jeu->nom = $request->input('nom');
            $jeu->description = $request->input('description');
            $jeu->nb_jeu = $request->input('nb_jeu');
        $jeu->save();

        swal()->autoclose('2000')->success('Mise à jour','Le jeu à bien été mis à jour !',[]);
        return redirect('admin/jeux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jeu  $jeu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jeu)
    {
        Jeu::destroy($id_jeu);

        swal()->autoclose('2000')->success('Mise à jour','Le jeu à bien été supprimé !',[]);
        return redirect('admin/jeux');
    }
}
