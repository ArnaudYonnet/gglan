@extends('layouts.template')

@section('title')
    GG-LAN
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12">
            <h2>Joueurs inscrits: <b>{{count($joueurs)}}</b></h2>
            <div class="row ml-4 mx-auto">
                @foreach ($joueurs as $joueur)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                        <a href="/joueurs/{{ $joueur->pseudo }}">
                            <div class="img-box">
                                <img src="{{ $joueur->avatar }}" style="max-width: 250px" class="img-responsive" >
                            </div>
                        </a>
                        <h1>
                            <a href="/joueurs/{{ $joueur->pseudo }}" class="text-danger"> {{ $joueur->pseudo }} </a>
                        </h1>
                        @foreach ($ranks as $rank)
                            @if ($rank->id_user == $joueur->id)
                                <h2 class="card-subtitle mb-2 text-muted">
                                    Rank: {{ $rank->nom }}
                                </h2>
                            @endif
                        @endforeach
                        @foreach ($equipes as $equipe)
                            @if ($equipe->id_user == $joueur->id)
                                <h2 class="card-subtitle mb-2 text-muted">
                                    Equipe:  <a href="/equipes/{{ $equipe->id }}/profil" class="text-danger">{{ $equipe->nom_equipe }}</a>
                                </h2> 
                            @endif
                        @endforeach
                        <p>{{ $joueur->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection