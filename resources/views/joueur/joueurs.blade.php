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
                                   Equipe:  <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom }}</a>
                                </h6> 
                            @endif
                        @endforeach
                        <p class="card-text"> {{ $joueur->description }} </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection