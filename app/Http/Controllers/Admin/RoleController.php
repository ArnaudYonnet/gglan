<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index')->with('roles', Role::all());
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

        $role = new Role;
            $role->name = $request->name;
            $role->players = ($request->players == 'on') ? 1 : 0;
            $role->tournaments = ($request->tournaments == 'on') ? 1 : 0;
            $role->meetings = ($request->meetings == 'on') ? 1 : 0;
            $role->posts = ($request->posts == 'on') ? 1 : 0;
            $role->partners = ($request->partners == 'on') ? 1 : 0;
            $role->admins = ($request->admins == 'on') ? 1 : 0;
        $role->save();

        flash('The role has been successfully created')->success();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        if ($role->important) 
        {
            flash('You cannot edit this role')->error();
            return redirect()->route('admin.roles.index');
        }

        $role->name = $request->name;
        $role->players = ($request->players == 'on') ? 1 : 0;
        $role->tournaments = ($request->tournaments == 'on') ? 1 : 0;
        $role->meetings = ($request->meetings == 'on') ? 1 : 0;
        $role->posts = ($request->posts == 'on') ? 1 : 0;
        $role->partners = ($request->partners == 'on') ? 1 : 0;
        $role->admins = ($request->admins == 'on') ? 1 : 0;
        $role->save();

        flash('The role has been successfully updated')->success();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        flash('The role has been successfully deleted')->success();
        return redirect()->route('admin.roles.index');
    }
}
