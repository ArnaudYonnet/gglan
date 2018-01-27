@extends('layouts.template')

@section('title')
    GGLAN
@endsection

@section('content')


@isset($joueur)
    <ul>
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
@else
    <ul>
        <li>Nom: 
            <b> {{ $profil->nom}} </b>
        </li>
        <li>Prenom: 
            <b> {{ $profil->prenom}} </b>
        </li>
        <li>Pseudo: 
            <b> {{ $profil->pseudo}} </b>
        </li>
        <li>E_Mail: 
            <b> {{ $profil->email}} </b>
        </li>
        <li>Date de naissance:
            <b> {{ \Carbon\Carbon::parse($profil->date_naissance)->format('d/m/Y') }} </b> 
        </li>
        <li>Ville:
            @empty($profil->ville)
                <b>Non-renseigné</b>
            @else
                <b>{{ $profil->ville }}</b>
            @endempty
        </li>
    </ul>    
@endisset




@endsection