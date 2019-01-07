<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Tournament;
use App\Admin;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = User::all()->count();

        $tournaments = Tournament::where('status', 'open')->get();
        $tournaments_count = 0;
        foreach ($tournaments as $tournament) {
            $tournaments_count += $tournament->teams()->count();
        }

        $posts = Post::where('visibility', 'public')->count();
        return view('admin.index')
                ->with('players', $players)
                ->with('tournaments', $tournaments_count)
                ->with('posts', $posts);
    }

    public function settings()
    {
        return view('admin.settings')->with('user', Auth::guard('admin')->user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Admin::find($request->user_id);
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
        $user->save();

        flash('Your account has been successfully updated !')->success();
        return redirect()->back();

    }
}
