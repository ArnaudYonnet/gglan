@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <div class="container col-lg-6">
        <ul class="list-unstyled">
            <li>Prenom: 
                <b> {{ $joueur->prenom}} </b>
            </li>
            <li>Pseudo: 
                <b> {{ $joueur->pseudo}} </b>
            </li>
            <li>Âge:
                <b> {{ \Carbon\Carbon::parse($joueur->date_naissance)->age }} ans</b> 
            </li>
            <li>Ville:
                @empty($joueur->ville)
                    <b>Non-renseigné</b>
                @else
                    <b>{{ $joueur->ville }}</b>
                @endempty
            </li>
            <li>Rank: 
                @empty($rank->nom)
                    <b>Non-renseigné</b>
                @else
                    <b>{{ $rank->nom }}</b>
                @endempty
            </li>
        </ul>
    </div
    <div class="container col-lg-6">
        @isset($equipe)
            <h3>Mon équipe:</h3>
            <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom }}</a>
        @endisset
    </div>
@endsection