<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = new AdminController();

        $ranks = Rank::all();

        return view('admin.ranks.index')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('ranks', $ranks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeux = \App\Models\Jeu::all();
        $info = new AdminController();

        return view('admin.ranks.create')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('jeux', $jeux);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rank = New Rank;

        $rank->id_jeu = $request->input('id_jeu');
        $rank->nom = $request->input('nom');
        $rank->image = $request->input('image');

        $rank->save();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le rank à bien été ajouté !',[]);
        return redirect('admin/ranks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rank)
    {
        $rank = Rank::find($id_rank);
        $jeux = \App\Models\Jeu::all();
        $info = new AdminController();

        return view('admin.ranks.edit')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('rank', $rank)
                ->with('jeux', $jeux);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rank)
    {
        $rank = Rank::find($id_rank);

        $rank->id_jeu = $request->input('id_jeu');
        $rank->nom = $request->input('nom');
        $rank->image = $request->input('image');

        $rank->save();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le rank à bien été mis à jour !',[]);
        return redirect('admin/ranks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rank)
    {
        Rank::destroy($id_rank);

        swal()->autoclose('2000')
              ->success('Mise à jour','Le rank à bien été supprimé !',[]);
        return redirect('admin/ranks');
    }
}
