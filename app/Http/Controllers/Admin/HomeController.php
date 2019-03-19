<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Update admin avatar
     *
     * @param Request $request
     * @return void
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:5240'
        ]);

        // Get the current admin
        $admin = Auth::guard('admin')->user();

        // Truncate path to fit with the Storage exists & delete method
        $url = str_replace('/storage', '', $admin->avatar);

        // Check & delete if an avatar already exist in the storage folder
        if (Storage::disk('public')->exists($url)) {
            Storage::disk('public')->delete($url);
        }

        // Upload the new avatar
        $path = Storage::putFile('public/avatars', $request->avatar);
        $admin->avatar = Storage::url($path);

        // Save the modification
        $admin->save();

        flash('Your avatar has been successfully updated')->success();
        return redirect()->back();
    }
}
