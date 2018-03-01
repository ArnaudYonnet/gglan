@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    
    @if ($profil->type == "Joueur")
        <div class="row">
            <div class="col-lg-6">
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
                    <li>Rank: 
                        @empty($rank->nom)
                            <b>Non-renseigné</b>
                        @else
                            <b>{{ $rank->nom }}</b>
                            <br />
                            <img src="{{ $rank->image }}" alt="Image introuvable...">
                        @endempty
                    </li>
                    <li>Description:
                        <p><b> {{ $profil->description }} </b></p>
                    </li>
                </ul>
                <a href="/profil/{{Auth::user()->id_public}}/edit" class="btn btn-success">Modifier mes informations</a>
                @isset($equipe)
                @else
                    <a href="/equipes/new" class="btn btn-success">Créer mon équipe</a>
                @endisset
            </div>
            @isset($edit)
                <div class="col-lg-6">
                    @include('profil.edit')
                </div>
            @endisset
            @isset($equipe)
                <div class="col-lg-6">
                    <h3>Mon équipe:</h3>
                    <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom_equipe }}</a>
                </div>
            @endisset
        </div>
    @else
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li>Nom: 
                        <b> {{ $profil->nom}} </b>
                    </li>
                    <li>Prenom: 
                        <b> {{ $profil->prenom}} </b>
                    </li>
                    <li>E-Mail: 
                        <b> {{ $profil->email}} </b>
                    </li>
                    <li>Date de naissance:
                        <b> {{ \Carbon\Carbon::parse($profil->date_naissance)->format('d/m/Y') }} </b> 
                    </li>
                </ul>
            </div>
        </div>
    @endif
@endsection