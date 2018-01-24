@extends('layouts.template')

@section('title')
    GG-LAN
@endsection


@section('content')
<h1>Equipes</h1>
    @foreach ($equipes as $equipe)
        <ul>
            <li><b> {{ $equipe->nom_equipe }} </b></li>
            @foreach ($joueurs as $joueur)
                @if ($equipe->id_user = $joueur->id)                            
                    <li>{{--  On affiche les joueurs de l'équipe  --}}</li>                    
                @endif
            @endforeach
            <li> {{ $equipe->desc_equipe }}</li>
        </ul>
    @endforeach

@endsection