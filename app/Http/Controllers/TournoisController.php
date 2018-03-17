<?php

namespace App\Http\Controllers;

use App\Tournois;
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
        $partenaires = \App\Partenaire::all();
        $tournois = Tournois::getTournois();

        return view('tournois.index')
               ->with('partenaires', $partenaires)
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
        //
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
    public function edit(Tournois $tournois)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournois $tournois)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournois  $tournois
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournois $tournois)
    {
        //
    }
}
