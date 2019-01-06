@extends('admin.layouts.template')

@section('header')
    {{ env('APP_NAME') }} | Dashboard
@endsection

@section('description')
    Managing everything
@endsection

@section('info')
    {{-- Number of players --}}
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3> {{ $players }} </h3>
    
                <p> {{ __('Joueurs inscrits')  }} </p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
            <a href=" {{ route('admin.users.index') }} " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- Number of players subscribe for the next tournaments --}}
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3> {{ $tournaments }} </h3>
    
                <p> {{ __('Equipe inscrite') }} </p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href=" {{ route('admin.tournaments.index') }} " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- Number of posts in public --}}
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3> {{ $posts }} </h3>
    
                <p> {{ __("Nombre d'articles") }} </p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href=" {{ route('admin.posts.index') }} " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
@endsection

@section('content')
    <h1>
        {{ __('Hello') }}, {{ Auth::guard('admin')->user()->name }} !
    </h1>
@endsection