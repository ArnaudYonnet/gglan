@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::cdn')
@include('sweetalert::view')
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
        {{--  @include('flash::message')  --}}
        
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
            <li>E-Mail: 
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
        <a href="/profil/{{Auth::id()}}/edit" class="btn btn-success">Modifier mes informations</a>
        <a href="/equipes/new" class="btn btn-success">Créer mon équipe</a>
    @endisset
@endsection