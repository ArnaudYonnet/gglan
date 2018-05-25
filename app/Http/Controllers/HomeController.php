<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home')
            ->with('posts',Post::where('visibility', 'public')->orderBy('id', 'desc')->take(4)->get());
    }

    public function rules()
    {
        return view('site.rules')->with('rule', Rule::first());
    }
}
