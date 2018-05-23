<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Meeting;
use Auth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.meetings.index')->with('meetings', Meeting::all());
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $meeting = New Meeting;
            $meeting->admin_id = Auth::guard('admin')->user()->id;
            $meeting->title = $request->title;
            $meeting->content = $request->content;
        $meeting->save();

        flash('Meeting report has been successfully created')->success();
        return redirect()->route('admin.meetings.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('admin.meetings.edit')->with('meeting', $meeting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $meeting->title = $request->title;
        $meeting->content = $request->content;
        $meeting->save();

        flash('Meeting report has been successfully updated')->success();
        return redirect('/admin/meetings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        flash('Meeting report has been successfully deleted')->success();
        return redirect()->route('admin.meetings.index');
    }
}
