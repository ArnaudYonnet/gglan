@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col mb-4">
            <a href="#search" class="btn btn-danger mx-auto">Rechercher une équipe</a>
        </div>
    </div>
    <div class="row">
        @foreach ($equipes as $equipe)
            <div class="col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                <div class="card">
                    <h5 class="card-header">
                        <a href="/equipes/{{ $equipe->id }}" class="text-danger"> {{ $equipe->nom_equipe }} </a>
                    </h5>
                    <div class="card-body">
                        <a href="/equipes/{{ $equipe->id }}" >
                            <img class="card-img-top" src="{{ $equipe->avatar_equipe }}" alt="Pas d'image trouvé :/">
                        </a>
                        <p></p>

                        <h6 class="card-subtitle mb-2">
                            <a href="/joueurs/{{ $equipe->getCapitaine()->id }}" class="text-danger">{{ $equipe->getCapitaine()->pseudo }}</a>
                        </h6>
                        @foreach ($equipe->getJoueurs() as $joueur) 
                            <h6 class="card-subtitle mb-2">
                                <a href="/joueurs/{{ $joueur->id }}" class="text-danger">{{ $joueur->pseudo }}</a>
                            </h6>
                        @endforeach
                        <p class="card-text"> {{ $equipe->description }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @component('layouts.search')
        @slot('type')
            equipes
        @endslot
        @slot('message')
            Tapez un nom d'équipe
        @endslot
    @endcomponent
@endsection