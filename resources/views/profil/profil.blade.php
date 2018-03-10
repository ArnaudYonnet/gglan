@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    @if ($profil->type == "Joueur")
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="{{ $profil->avatar }}" class="img-fluid" style="max-width: 250px" alt="">

                <br />

                <a href="/profil/{{Auth::user()->id_public}}/edit" class="btn btn-danger" style="margin-top: 2vh;">
                    Modifier mes informations
                </a>

                <br />

                @isset($equipe)
                    <a href="/equipes/{{ $equipe->id }}/profil" class="btn btn-danger" style="margin-top: 2vh;">Mon Equipe</a>
                @else
                    <a href="/equipes/new" class="btn btn-danger" style="margin-top: 2vh;">Créer mon équipe</a>
                @endisset
            </div>

            <div class="col-lg-3 col-md-4 col-sm-8">
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
                
            </div>

            @isset($edit)
                <div class="col-lg-5 col-md-10 col-sm-12">
                    @include('profil.edit')
                </div>
            @endisset
            
        </div>
    @else
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="{{ $profil->avatar }}" class="img-fluid" style="max-width: 250px" alt="">
            </div>
        
            <div class="col-lg-3 col-md-4 col-sm-8">
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