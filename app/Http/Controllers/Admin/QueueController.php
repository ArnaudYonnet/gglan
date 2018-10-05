<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Imtigger\LaravelJobStatus\JobStatus;

class QueueController extends Controller
{
    public function index()
    {
        return view('admin.queues.index')->with('jobs', JobStatus::all());
    }

    public function deleteAll()
    {
        foreach (JobStatus::all() as $jobstatus) 
        {
            $jobstatus->delete();
        }

        flash('All clear !')->success();
        return redirect()->route('admin.queues.index');
    }
}
