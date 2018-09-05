<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use App\User;
use App\Log;
use App\JoinRequest;
use Auth;
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
        return view('site.teams.index')->with('teams', Team::paginate(12));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'game_id' => 'required',
            'avatar' => 'image|max:5000'
        ]);
        
        // Create team
        $team = new Team;
            $team->name = $request->name;
            $team->user_id = Auth::user()->id;
            $team->game_id = $request->game_id;
            if ($request->avatar){
                $team->avatar = $request->avatar->store('public/avatars');
            }
        $team->save();

        // Create relation
        $team->players()->attach(Auth::user()->id);

        // Log team
        Log::create([
            'type' => 'Create',
            'team_id' => $team->id,
            'ip'=> Log::getIp()
        ]);


        flash('Your team has been successfully created !')->success()->important();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('site.teams.show')->with('team', $team);
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
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'avatar' => 'image|max:5000'
        ]);

        $team->name = $request->name;
        $team->description = $request->description;
        if ($request->avatar){
            $team->avatar = $this->upload($team->avatar, $request->avatar, 'public/avatars');
        }
        $team->save();

        // Log team
        Log::create([
            'type' => 'Update',
            'team_id' => $team->id,
            'ip'=> Log::getIp()
        ]);

        flash('Your team has been updated')->success()->important();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // Log team
        Log::create([
            'type' => 'Delete',
            'team_id' => $team->id,
            'ip'=> Log::getIp()
        ]);

        $team->avatar ? Storage::delete($team->avatar) : true;
        $team->players()->detach();
        $team->delete();

        flash('Your team has been successfully deleted !')->success();
        return redirect()->back();
    }

    /**
     * Remove a player from a specified team
     *
     * @param Request $request
     * @return void
     */
    public function deleteMate(Request $request)
    {
        $user = User::find($request->user_id);

        $user->teams()->detach($request->team_id);
        JoinRequest::destroy($request->joinrequest_id);

        flash('The player has been successfully deleted')->success()->important();
        return redirect()->back();
    }

    /**
     * Create a join request and send an email to the captain team
     *
     * @param Request $request
     * @return void
     */
    public function joinrequest(Request $request)
    {
        // Create a new request
        $join = new JoinRequest;
            $join->user_id = $request->user_id;
            $join->team_id = $request->team_id;
        $join->save();

        MailController::joinrequest($request->user_id, $request->team_id);

        // en
        flash('The mail has been successfully send! You will receive a response when the captain has decided !')->success()->important(); 

        // fr
        // flash('La demande à été envoyé avec succès ! Vous recevrez un mail quand le capitaine aura décidé !')->success()->important();

        return redirect()->back();
    }

    /**
     * Update the join request and send an email in accordingly
     *
     * @param Request $request
     * @return void
     */
    public function decisionJoinrequest(Request $request)
    {
        if ($request->decision == "accept") 
        {
            $joinrequest = JoinRequest::find($request->joinrequest_id);
                $joinrequest->status = "accepted";
            $joinrequest->save();

            Team::find($joinrequest->team_id)->players()->attach($joinrequest->user_id);

            MailController::acceptrequest($joinrequest->user_id);

            flash('The player has been successfully added to the team !')->success()->important();
            return redirect()->back(); 
        }
        else 
        {
            $joinrequest = JoinRequest::find($request->joinrequest_id);
                $joinrequest->status = "refused";
            $joinrequest->save();

            MailController::refuserequest($joinrequest->user_id);

            flash('The player has been successfully refused !')->success()->important();
            return redirect()->back();
        }
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
