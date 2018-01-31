@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <div class="container col-lg-6">
        <ul class="list-unstyled">
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
        @isset($equipe)
        @else
            <a href="/equipes/new" class="btn btn-success">Créer mon équipe</a>
        @endisset
    </div>
    <div class="container col-lg-6">
        @isset($equipe)
            <h3>Mon équipe:</h3>
            <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom }}</a>
        @endisset
            
    </div>
        {{--  @include('flash::message')  --}}
@endsection