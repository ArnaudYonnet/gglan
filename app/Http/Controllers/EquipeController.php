<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipeRequest;
use App\Http\Requests\AppartenanceRequest;
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
        $tournois = \App\Tournois::getTournois();
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
        $tournois = \App\Tournois::getTournois();
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
        $tournois = \App\Tournois::getTournois();
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
        Equipe::destroy($id);

        swal()->autoclose(2000)
              ->success('Mise à jour',"L'équipe à bien été supprimé !",[]);
            return redirect('/admin/equipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyJoueur($id_equipe, $id_joueur)
    {
        \App\Appartenance::where('id_equipe', $id_equipe)
                         ->where('id_user', $id_joueur)
                         ->delete();

        foreach (\App\Tournois::getTournois() as $tournois) 
        {
            $equipe = \App\Participation::where('id_equipe', $id_equipe)
                                        ->where('id_tournois', $tournois->id)
                                        ->first();
            if ($equipe) 
            {
                \App\Participation::where('id_equipe', $id_equipe)
                                  ->where('id_tournois', $tournois->id)
                                  ->delete();
                
                swal()->autoclose('2000')->success('Mise à jour', \App\User::find($id_joueur)->pseudo.' à bien été supprimé !',[]);
                return redirect('equipes/'.$id_equipe);
            }
        }        
    }
}
