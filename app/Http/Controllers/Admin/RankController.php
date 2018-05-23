<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rank;
use Illuminate\Support\Facades\Storage;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ranks.index')->with('ranks', Rank::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $rank = New Rank;
            $rank->game_id = $request->game_id;
            $rank->name = $request->name;
            if ($request->logo){
                $rank->logo = $request->logo->store('public/ranks');
            }
        $rank->save();

        flash('The rank has been successfully added')->success();
        return redirect()->route('admin.ranks.index');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $rank->game_id = $request->game_id;
        $rank->name = $request->name;
        if ($request->logo){
            $rank->logo = $this->upload($rank->logo, $request->logo, 'public/ranks');
        }
        $rank->save();

        flash('The rank has been successfully updated')->success();
        return redirect()->route('admin.ranks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        $rank->logo ? Storage::delete($rank->logo) : true;
        $rank->delete();

        flash('The rank has been successfully deleted')->success();
        return redirect()->route('admin.ranks.index');
    }

    private function upload($avatar, $existingAvatar, $path)
    {
        if ($avatar != $existingAvatar) 
        {
            Storage::delete($avatar);
        }
        $filePath = $existingAvatar->store($path);
        return $filePath;
    }
}
