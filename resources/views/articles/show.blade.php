@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <h1> {{ $article->titre_article }} </h1>
        {!! $article->contenu_article !!}
    </div>
</div>
@endsection