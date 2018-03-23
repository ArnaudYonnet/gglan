<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;

use \App\Models\User;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = \App\Models\Partenaire::all();
        $tournois = \App\Models\Tournois::getTournois();
        $joueurs = User::where('type', '!=', 'visiteur')->get();

        return view('joueur.index')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois)
                ->with('joueurs', $joueurs);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenaires = \App\Models\Partenaire::all();
        $tournois = \App\Models\Tournois::getTournois();
        $ranks = \App\Models\Rank::all();

        $joueur = User::find($id);

        return view('joueur.show')
                ->with('partenaires', $partenaires)
                ->with('tournois', $tournois)
                ->with('ranks', $ranks)
                ->with('joueur', $joueur);

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
    public function update(EditUserRequest $request, $id)
    {
        $joueur = User::find($id);
            $joueur->pseudo = $request->input('pseudo');
            $joueur->avatar = $request->input('avatar');
            $joueur->ville = $request->input('ville');
            $joueur->description = $request->input('description');
        $joueur->save();

        if ($joueur->getRank()) 
        {
            $entrainement = \App\Models\Entrainement::where('id_user', $id)->first();
                $entrainement->id_rank = $request->input('rank');
            $entrainement->save();
        }
        else
        {
            $rank = \App\Rank::find($request->input('rank'));
            $entrainement = new \App\Models\Entrainement;
                $entrainement->id_jeu = $rank->id_jeu;
                $entrainement->id_user = $id;
                $entrainement->id_rank = $request->input('rank');
            $entrainement->save();
        }

        swal()->autoclose(2000)
              ->success('Mise à jour','Votre profil a bien été mis à jour !',[]);
        return redirect('joueurs/'. $id);
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
