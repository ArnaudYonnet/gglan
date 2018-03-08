@extends('layouts.template')

@section('title')
    GG-LAN
@endsection

@section('content')
<h2>Joueurs inscrit: <b>{{count($joueurs)}}</b></h2>
    <div class="row">
        @foreach ($joueurs as $joueur)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card" >
                                <h5 class="card-header">
                                    <a href="/joueurs/{{ $joueur->pseudo }}" class="text-danger">{{ $joueur->pseudo }}</a>
                                </h5>
        
                                <div class="card-body">
                                    <img src="{{ $joueur->avatar }}" style="max-width: 250px" class="card-img img-fluid">
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
            </div>
        @endforeach
    </div>
@endsection

