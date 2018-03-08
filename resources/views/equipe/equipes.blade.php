@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
@include('sweetalert::view')
    <h2>Place equipe restantes <b>{{16-count($equipes)}}</b></h2>
    <div class="row">
        @foreach ($equipes as $equipe)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <h5 class="card-header">
                        <a href="/equipes/{{ $equipe->id }}/profil" class="text-danger"> {{ $equipe->nom_equipe }} </a>
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
            </div>
        @endforeach
    </div>
@endsection