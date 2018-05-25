<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
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
            'pseudo' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:users',
        ]);

        $user = New User;
            $user->name = $request->name;
            $user->pseudo = $request->pseudo;
            $user->birth_date = $request->birth_date;
            $user->email = $request->email;
            if ($request->avatar){
                $user->avatar = $request->avatar->store('public/avatars');
            }
            $user->password = bcrypt('secret');
        $user->save();

        flash('The player has been successfully created')->success();
        return redirect()->route('admin.users.index');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'birth_date' => 'required|date',
        ]);


        $user->name = $request->name;
        $user->pseudo = $request->pseudo;
        $user->birth_date = $request->birth_date;
        if ($request->avatar){
            $user->avatar = $this->upload($user->avatar, $request->avatar, 'public/avatars');
        }
        $user->save();

        flash('The player has been successfully updated')->success();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->avatar ? Storage::delete($user->avatar) : true;
        $user->delete();

        flash('The player has been successfully deleted')->success();
        return redirect()->route('admin.users.index');
    }

    private function upload($avatar, $existingAvatar, $path)
    {
        if ($avatar != $existingAvatar) 
        {
            echo "prout";
            Storage::delete($avatar);
        }
        $filePath = $existingAvatar->store($path);
        return $filePath;
    }
}
