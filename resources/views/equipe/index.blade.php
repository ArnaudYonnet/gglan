@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    @if (16-count($equipes) <= 0)
        <h2>Toutes les places sont prises !</h2>
    @else
        <h2 >Place equipe restantes: <b class="text-danger">{{16-count($equipes)}}</b></h2>
    @endif
    <div class="row">
        @foreach ($equipes as $equipe)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <h5 class="card-header">
                        <a href="/equipes/{{ $equipe->id }}" class="text-danger"> {{ $equipe->nom_equipe }} </a>
                    </h5>
                    <div class="card-body">
                        <img class="card-img-top" src="{{ $equipe->avatar_equipe }}" alt="Pas d'image trouvé :/">

                        <p></p>

                        <h6 class="card-subtitle mb-2">
                            <a href="/joueurs/{{ $equipe->getCapitaine()->pseudo }}" class="text-danger">{{ $equipe->getCapitaine()->pseudo }}</a>
                        </h6>
                        @foreach ($equipe->getJoueurs() as $joueur) 
                            <h6 class="card-subtitle mb-2">
                                <a href="/joueurs/{{ $joueur->pseudo }}" class="text-danger">{{ $joueur->pseudo }}</a>
                            </h6>
                        @endforeach
                        <p class="card-text"> {{ $equipe->description }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection