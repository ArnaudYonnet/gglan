@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
    <h1>Joueurs</h1>
    <ul class="list-unstyled list-inline">
        @foreach ($joueurs as $joueur)
            <li class="list-inline-item">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/joueurs/{{ $joueur->pseudo }}"> {{ $joueur->pseudo }} </a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rank</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Last Team</h6>
                        <p class="card-text"> {{ $joueur->description }} </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection