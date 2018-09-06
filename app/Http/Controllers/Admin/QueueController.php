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
}
