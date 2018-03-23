<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Rank;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Rank::all();
        $jeux = \App\Models\Jeu::all();

        return view('admin.rank.index')
                ->with('ranks', $ranks)
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
        $rank = New Rank;
            $rank->id_jeu = $request->input('id_jeu');
            $rank->nom = $request->input('nom');
            $rank->image = $request->input('image');
        $rank->save();

        swal()->autoclose('2000')->success('Mise à jour','Le rank à bien été ajouté !',[]);
        return redirect('admin/ranks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rank)
    {
        $rank = Rank::find($id_rank);
        $jeux = \App\Models\Jeu::all();

        return view('admin.rank.edit')
                ->with('rank', $rank)
                ->with('jeux', $jeux);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rank)
    {
        $rank = Rank::find($id_rank);
            $rank->id_jeu = $request->input('id_jeu');
            $rank->nom = $request->input('nom');
            $rank->image = $request->input('image');
        $rank->save();

        swal()->autoclose('2000')->success('Mise à jour','Le rank à bien été mis à jour !',[]);
        return redirect('admin/ranks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rank)
    {
        Rank::destroy($id_rank);

        swal()->autoclose('2000')->success('Mise à jour','Le rank à bien été supprimé !',[]);
        return redirect('admin/ranks');
    }
}
