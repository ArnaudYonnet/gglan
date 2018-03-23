<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = Partenaire::all();

        return view('admin.partenaire.index')
                ->with('partenaires', $partenaires);
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
        $partenaire = new Partenaire();
            $partenaire->nom_partenaire = $request->input('nom_partenaire');
            $partenaire->site_partenaire = $request->input('site_partenaire');
            $partenaire->img_partenaire = $request->input('img_partenaire');
        $partenaire->save();

        swal()->autoclose('2000')->success('Mise à jour',"Le partenaire à bien été ajouté",[]);
        return redirect('admin/partenaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partenaire = Partenaire::find($id);

        return view('admin.partenaire.edit')
                ->with('partenaire', $partenaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partenaire = Partenaire::find($id);
            $partenaire->nom_partenaire = $request->input('nom_partenaire');
            $partenaire->site_partenaire = $request->input('site_partenaire');
            $partenaire->img_partenaire = $request->input('img_partenaire');
        $partenaire->save();

        swal()->autoclose('2000')->success('Mise à jour','Le partenaire à bien été mis à jour !',[]);
        return redirect('admin/partenaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partenaire::destroy($id);

        swal()->autoclose('2000')->success('Mise à jour','Le partenaire à bien été supprimé !',[]);
        return redirect('admin/partenaires');
    }
}
