@extends('layouts.template')

@section('title')
    GGLAN
@endsection

@section('content')
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
@endsection