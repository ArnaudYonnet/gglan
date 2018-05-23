<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Team;
use App\JoinRequest;
use Auth;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.players.index')
            ->with('players', User::paginate(12));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $player
     * @return \Illuminate\Http\Response
     */
    public function show(User $player)
    {
        return view('site.players.show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(User $player)
    {
        if (Auth::check() && Auth::user()->id == $player->id) 
        {
            return view('site.players.edit')->with('player', $player);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'avatar' => 'image|max:5000'
        ]);

        $player->name = $request->name;
        $player->pseudo = $request->pseudo;
        $player->steam = $request->steam;
        $player->discord = $request->discord;
        $player->twitter = $request->twitter;
        $player->description = $request->description;
        if ($request->avatar){
            $player->avatar = $this->upload($player->avatar, $request->avatar, 'public/avatars');
        }
        $player->save();

        flash('Your account has been successfully updated !')->success();
        return redirect()->back();
    }

    public function teams()
    {
        return view('site.players.teams')->with('player', Auth::user());
    }

    public function addGame(Request $request, $player)
    {
        $user = User::find($player);
        $user->games()->attach($request->game_id);

        flash('The game has been added !')->success()->important();
        return redirect()->back();
    }

    public function deleteGame(Request $request, $player)
    {
        $user = User::find($player);
        if ($request->rank_id) {
            $user->ranks()->detach($request->rank_id);
        }
        $user->games()->detach($request->game_id);

        flash('The game has been deleted !')->success()->important();
        return redirect()->back();
    }

    public function addRank(Request $request, $player)
    {
        DB::table('game_user')
            ->where('user_id', $player)
            ->where('game_id', $request->game_id)
            ->update(['rank_id' => $request->rank_id]);

        flash('Your rank has been updated !')->success()->important();
        return redirect()->back();
    }

    public function leaveTeam(Request $request)
    {
        $user = User::find($request->user_id);
        $joinrequest = JoinRequest::where('user_id', $request->user_id)->where('team_id', $request->team_id)->first();

        $joinrequest->delete();
        $user->teams()->detach($request->team_id);

        flash('You successfully leave the team !')->success()->important();
        return redirect()->back();
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
