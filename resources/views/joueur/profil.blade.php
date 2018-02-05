@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-6">
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
                        <br />
                        <img src="{{ $rank->image }}" alt="Image introuvable...">
                    @endempty
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            @isset($equipe)
                <h3>Son équipe:</h3>
                <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom }}</a>
            @endisset
        </div>
    </div>
@endsection