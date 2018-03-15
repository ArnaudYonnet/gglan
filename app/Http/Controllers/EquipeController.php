<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipeRequest;
use \App\Equipe;
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
        $partenaires = \App\Partenaire::all();
        $tournois = \App\Tournois::where('status', 'ouvert')->first();
        $equipes = Equipe::all();

        return view('equipe.index')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois)
                ->with('equipes', $equipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partenaires = \App\Partenaire::all();
        $tournois = \App\Tournois::where('status', 'ouvert')->first();
        $jeux = \App\Jeu::all();

        if (Auth::user()->getEquipe()) 
        {
            return redirect('equipes/'.Auth::user()->getEquipe()->id);
        }

        return view('equipe.create')
                    ->with('partenaires', $partenaires)
                    ->with('tournois', $tournois)
                    ->with('jeux', $jeux);
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

        $id_equipe = Equipe::where('nom_equipe', $request->input('nom'))->value('id');

        swal()->autoclose(2000)
              ->success('Mise à jour','Votre équipe a bien été créer !',[]);
        return redirect('equipes/'. $id_equipe );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenaires = \App\Partenaire::all();
        $tournois = \App\Tournois::where('status', 'ouvert')->first();
        $equipe = Equipe::find($id);

        return view('equipe.show')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois)
                ->with('equipe', $equipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
