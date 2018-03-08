@extends('layouts.template')

@section('title')
    GG-LAN
@endsection

@section('content')
    <div class="row">
        <br />
        <h3>Joueurs inscrits: <b>{{count($joueurs)}}</b></h3>

        <div class="col-lg-11">
            <div class="card-columns">
                @foreach ($joueurs as $joueur)
                    <div class="card w-80">
                        <h5 class="card-header">
                            <a href="/joueur/{{ $joueur->pseudo }}" class="text-danger"> {{ $joueur->pseudo }} </a>
                        </h5>
                        <div class="card-body">
                            <img class="card-img-top img-fluid" src="{{ $joueur->avatar }}" alt="Avatar introuvable..." >
                            <p></p>
                            @foreach ($ranks as $rank)
                                    @if ($rank->id_user == $joueur->id)
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Rank: {{ $rank->nom }}
                                        </h6>
                                    @endif
                            @endforeach
                            @foreach ($equipes as $equipe)
                                    @if ($equipe->id_user == $joueur->id)
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Equipe:  <a href="/equipes/{{ $equipe->id }}/profil" class="text-danger">{{ $equipe->nom_equipe }}</a>
                                        </h6> 
                                    @endif
                            @endforeach
                            <p class="card-text"> {{ $joueur->description }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection