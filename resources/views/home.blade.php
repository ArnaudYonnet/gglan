@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h1>News</h1>
    <ul>
        @foreach ($articles as $article)
            <li> {{ $article->id_article  }} </li>
        @endforeach
    </ul>
    
@endsection