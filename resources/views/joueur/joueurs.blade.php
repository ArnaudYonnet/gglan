@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
    <br />
    <h2>Joueurs inscrits: <b>{{count($joueurs)}}</b></h2>
    <div class="card-columns">
        @foreach ($joueurs as $joueur)
            <div class="card" style="max-width: 20rem">
                <h5 class="card-header">
                    <a href="/joueurs/{{ $joueur->pseudo }}"> {{ $joueur->pseudo }} </a>
                </h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Rank: 
                        @foreach ($ranks as $rank)
                            @if ($rank->id_user == $joueur->id)
                            {{ $rank->nom }}
                            @endif
                        @endforeach
                    </h6>
                    @foreach ($equipes as $equipe)
                        @if ($equipe->id_user == $joueur->id)
                        <h6 class="card-subtitle mb-2 text-muted">
                            Equipe:  <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom_equipe }}</a>
                        </h6> 
                        @endif
                    @endforeach
                    <p class="card-text"> {{ $joueur->description }} </p>
                    <img class="card-img-top" src="{{ $joueur->avatar }}" alt="Avatar introuvable...">
                </div>
            </div>
        @endforeach
    </div>
@endsection