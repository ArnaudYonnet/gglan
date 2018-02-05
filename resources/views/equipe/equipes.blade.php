@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::view')
    <br />
    <h2>Equipes inscrites: <b>{{count($equipes)}}</b></h2>
    <div class="card-columns">
        @foreach ($equipes as $equipe)
            <div class="card" style="width: 20rem;">
                <h5 class="card-header">
                    <a href="/equipes/{{ $equipe->id }}/profil"> {{ $equipe->nom }} </a>
                </h5>
                <div class="card-body">
                    @foreach ($joueurs as $joueur)   
                        @if ($equipe->id == $joueur->id_equipe)
                        <h6 class="card-subtitle mb-2 text-muted">{{ $joueur->pseudo }}</h6>   
                        @endif                      
                    @endforeach
                    <p class="card-text"> {{ $equipe->description }} </p>
                    <img class="card-img-top" src="/img/profil.png" alt="Card image cap">
                </div>
            </div>
        @endforeach
    </div>

@endsection