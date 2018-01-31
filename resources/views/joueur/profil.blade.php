@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <ul class="list-unstyled">
        <li>Nom: 
            <b> {{ $joueur->nom}} </b>
        </li>
        <li>Prenom: 
            <b> {{ $joueur->prenom}} </b>
        </li>
        <li>Pseudo: 
            <b> {{ $joueur->pseudo}} </b>
        </li>
        <li>E_Mail: 
            <b> {{ $joueur->email}} </b>
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
    </ul>
@endsection