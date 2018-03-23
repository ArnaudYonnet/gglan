<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Tournois;
use App\Models\Participation;
use Illuminate\Http\Request;

class TournoisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournois = Tournois::all();
        $jeux = \App\Models\Jeu::all();

        return view('admin.tournois.index')
               ->with('jeux', $jeux)
               ->with('tournois', $tournois);
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
        $tournois = new Tournois;
            $tournois->nom_tournois = $request->input('nom_tournois');
            $tournois->date_deb = $request->input('date_deb');
            $tournois->date_fin = $request->input('date_fin');
            $tournois->description = $request->input('description');
            $tournois->place_equipe = $request->input('place_equipe');
            $tournois->id_jeu = $request->input('id_jeu');
            $tournois->status = $request->input('status');
        $tournois->save();

        swal()->autoclose('2000')->success('Mise à jour','Le tournois à bien été créer',[]);
            return redirect('admin/tournois');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function show(Tournois $tournois)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournois = Tournois::find($id);
        $jeux = \App\Models\Jeu::all();

        return view('admin.tournois.edit')
               ->with('jeux', $jeux)
               ->with('tournois', $tournois);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tournois = Tournois::find($id);
            $tournois->nom_tournois = $request->input('nom_tournois');
            $tournois->date_deb = $request->input('date_deb');
            $tournois->date_fin = $request->input('date_fin');
            $tournois->description = $request->input('description');
            $tournois->place_equipe = $request->input('place_equipe');
            $tournois->id_jeu = $request->input('id_jeu');
            $tournois->status = $request->input('status');
        $tournois->save();
            

        swal()->autoclose('2000')->success('Mise à jour','Le tournois à bien été modifié !',[]);
        return redirect('admin/tournois');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tournois::destroy($id);

        swal()->autoclose('2000')->success('Mise à jour','Le tournois à bien été supprimé !',[]);
        return redirect('admin/tournois');
    }
}
