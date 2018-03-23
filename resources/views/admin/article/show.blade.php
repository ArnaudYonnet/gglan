@extends('layouts.admin.template')
@section('title')
    {{ $article->titre_article }}
@endsection
@section('subtitle')
    Article n° {{ $article->id }} 
@endsection 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title"> {{ $article->titre_article }} </h3>
            </div>
            <div class="box-body">
                {!! $article->contenu_article !!}
            </div>
        </div>
    </div>
</div>
@endsection