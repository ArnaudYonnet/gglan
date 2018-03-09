@extends('layouts.templateHome')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h2>News</h2>
    @include('articles.articles')
@endsection