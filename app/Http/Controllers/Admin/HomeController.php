<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;

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
        return view('admin.index');
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
