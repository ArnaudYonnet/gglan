<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teams.index')->with('teams', Team::all());
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
            'user_id' => 'required',
        ]);
        
        // Create team
        $team = new Team;
            $team->name = $request->name;
            $team->user_id = $request->user_id;
            $team->game_id = $request->game_id;
            if ($request->avatar){
                $team->avatar = $request->avatar->store('public/avatars');
            }
        $team->save();

        // Create relation
        $team->players()->attach($request->user_id);

        flash('The team has been successfully created !')->success();
        return redirect()->route('admin.teams.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $team->name = $request->name;
        $team->description = $request->description;
        $team->game_id = $request->game_id;
        if ($request->avatar){
            $team->avatar = $this->upload($team->avatar, $request->avatar, 'public/avatars');
        }
        $team->save();

        flash('The team has been successfully updated !')->success();
        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->avatar ? Storage::delete($team->avatar) : true;
        $team->players()->detach();
        $team->delete();

        flash('The team has been successfully deleted !')->success();
        return redirect()->route('admin.teams.index');
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
