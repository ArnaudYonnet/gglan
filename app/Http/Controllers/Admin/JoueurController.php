<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $joueurs = User::where('type', '!=', 'visiteur')->get();

        return view('admin.joueur.index')
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
        User::create([
                'id_public' => $request['id_public'],
                'pseudo' => $request['pseudo'],
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'avatar' => $request['avatar'],
                'description' => $request['description'],
                'date_naissance' => $request['date_naissance'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'type' => "Joueur",
            ]);
        
        swal()->autoclose(2000)->success('Mise à jour', "Le joueur à bien été crée !", []);
        return redirect('admin/joueurs');
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
        $joueur = User::find($id);
        return view('admin.joueur.edit')
                ->with('joueur', $joueur);
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
        $joueur = User::find($id);
            $joueur->nom = $request->input('nom');
            $joueur->prenom = $request->input('prenom');
            $joueur->description = $request->input('description');
            $joueur->avatar = $request->input('avatar');
            $joueur->pseudo = $request->input('pseudo');
        $joueur->save();

        swal()->autoclose(2000)->success('Mise à jour','Le joueur a bien été mis à jour !',[]);
        return redirect('admin/joueurs');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        swal()->autoclose(2000)->success('Mise à jour', "Le joueur à bien été supprimé !", []);
        return redirect('admin/joueurs');
    }
}
