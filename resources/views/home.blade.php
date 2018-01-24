@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h1>News</h1>
    <ul>
        @foreach ($articles as $articles)
            <li> {{ $article->id  }} </li>
        @endforeach
    </ul>
    
@endsection