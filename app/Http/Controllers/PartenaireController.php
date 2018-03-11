<?php

namespace App\Http\Controllers;

use App\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = new AdminController();

        $partenaires = Partenaire::all();

        return view('admin.partenaires.index')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('partenaires', $partenaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = new AdminController();

        return view('admin.partenaires.create')
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
        $partenaire = new Partenaire();

        $partenaire->nom_partenaire = $request->input('nom_partenaire');
        $partenaire->site_partenaire = $request->input('site_partenaire');
        $partenaire->img_partenaire = $request->input('img_partenaire');

        $partenaire->save();


        swal()->autoclose('2000')
              ->success('Mise à jour',"Le partenaire à bien été ajouté",[]);
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
    public function edit($id_partenaire)
    {
        $info = new AdminController();

        $partenaire = Partenaire::find($id_partenaire);

        return view('admin.partenaires.edit')
                ->with('inscrits', $info->infoInscrit()["inscrits"])
                ->with('equipes', $info->infoInscrit()["equipes"])
                ->with('partenaire', $partenaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_partenaire)
    {
        $partenaire = Partenaire::find($id_partenaire);

        $partenaire->nom_partenaire = $request->input('nom_partenaire');
        $partenaire->site_partenaire = $request->input('site_partenaire');
        $partenaire->img_partenaire = $request->input('img_partenaire');

        $partenaire->save();

        swal()->autoclose('2000')
              ->success('Mise à jour','Le partenaire à bien été mis à jour !',[]);
        return redirect('admin/partenaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_partenaire)
    {
        Partenaire::destroy($id_partenaire);

        swal()->autoclose('2000')
              ->success('Mise à jour','Le partenaire à bien été supprimé !',[]);
        return redirect('admin/partenaires');
    }
}
