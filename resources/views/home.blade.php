@extends('layouts.templateHome')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h1>News</h1>
    @include('articles.articles')
@endsection