@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h1> {{ $article->titre_article }} </h1>
    {!! $article->contenu_article !!}
    
@endsection