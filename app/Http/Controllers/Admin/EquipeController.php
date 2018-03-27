<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Equipe;
use Auth;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();

        return view('admin.equipe.index')
                ->with('equipes', $equipes);
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
    public function store(EquipeRequest $request)
    {
        $equipe = New Equipe;
            $equipe->nom_equipe = $request->input('nom');
            $equipe->id_capitaine = Auth::id();
            $equipe->avatar_equipe = $request->input('avatar_equipe');
            $equipe->id_jeu = $request->input('jeu');
        $equipe->save();

        swal()->autoclose(2000)->success('Mise à jour',"L'équipe a bien été créer !",[]);
        return redirect('admin/equipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipe = Equipe::find($id);
        $joueurs = \App\Models\User::where('admin', 0)
                                    ->where('type', 'Joueur')
                                    ->get();
        return view('admin.equipe.edit')
                ->with('equipe', $equipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipe = Equipe::find($id);
            $equipe->nom_equipe = $request->input('nom_equipe');
            $equipe->description = $request->input('description');
            $equipe->avatar_equipe = $request->input('avatar_equipe');
        $equipe->save();

        swal()->autoclose(2000)->success('Mise à jour',"L'équipe a bien été mise à jour !",[]);
        return redirect('admin/equipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipe::destroy($id);

        swal()->autoclose(2000)
              ->success('Mise à jour',"L'équipe à bien été supprimé !",[]);
            return redirect('/admin/equipes');
    }
}
