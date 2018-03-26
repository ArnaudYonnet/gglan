<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InfoPratique;

class InfoPratiqueController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $info = InfoPratique::find(1);
        return view('admin.info.show')->with('info', $info);
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
    public function update(Request $request)
    {
        $info = InfoPratique::find(1);
            $info->info = $request->input('contenu');
        $info->save();

        swal()->autoclose(2000)->success('Mise à jour', "Les infos pratiques ont bien été mise à jour !", []);
        return back();
    }
}
