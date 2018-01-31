@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::cdn')
@include('sweetalert::view')
    <div class="container col-lg-6">
        <ul class="list-unstyled">
            <li>Nom: 
                <b> {{ $equipe->nom}} </b>
            </li>
            <li>Capitaine:
                @foreach ($joueurs as $joueur)
                    @if ($joueur->id == $equipe->id_capitaine)
                        <b> {{ $joueur->pseudo }} </b>
                    @endif
                @endforeach
            </li>
            <li>Membres:
                <ul>
                    @foreach ($joueurs as $joueur)
                        @if ($joueur->id != $equipe->id_capitaine)
                            <li><b> {{ $joueur->pseudo }} </b></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>
        @if (count($joueurs) < 5)
            <a href="/equipes/{{ $equipe->id }}/add" class="btn btn-success">Ajouter des équipiers</a>
        @endif
    </div>

    <div class="container col-lg-6">
        @isset($add)
            @include('equipe.add')
        @endisset
    </div>

@endsection