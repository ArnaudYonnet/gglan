@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{ $joueur->avatar }}" style="max-width: 250px" alt="">
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li>Pseudo: 
                                <b> {{ $joueur->pseudo}} </b>
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
                            <li>Description:
                                <p><b> {{ $joueur->description }} </b></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @isset($equipe)
                <h3>Son équipe:</h3>
                <a href="/equipes/{{ $equipe->id }}/profil">{{ $equipe->nom_equipe }}</a> @endisset
            </div>
        </div>
@endsection