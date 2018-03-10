@extends('layouts.template')


@section('title')
    GGLAN
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-6 col-12">
            <img src="{{ $joueur->avatar }}" style="max-width: 250px" alt="">
        </div>

        <div class="col-lg-4 col-md-5 col-sm-5 col-12">
                        <ul class="list-unstyled">
                            <li class="list-item">Pseudo: 
                                <b> {{ $joueur->pseudo}} </b>
                            </li>
                            <li class="list-item">Ville:
                                @empty($joueur->ville)
                                    <b>Non-renseigné</b>
                                @else
                                    <b>{{ $joueur->ville }}</b>
                                @endempty
                            </li>
                            <li class="list-item">Rank: 
                                @empty($rank->nom)
                                    <b>Non-renseigné</b>
                                @else
                                    <b>{{ $rank->nom }}</b>
                                    <br />
                                    <img src="{{ $rank->image }}" alt="Image introuvable...">
                                @endempty
                            </li>
                            <li class="list-item">Description:
                                <p><b> {{ $joueur->description }} </b></p>
                            </li>
                            <li class="list-item">
                                @isset($equipe)
                                    <b>Son équipe:</b>
                                    <a href="/equipes/{{ $equipe->id }}/profil" class="btn btn-danger">{{ $equipe->nom_equipe }}</a> 
                                @endisset
                            </li>
                        </ul>
        </div>
    </div>
@endsection