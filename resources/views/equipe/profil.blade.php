@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::cdn')
@include('sweetalert::view')

    <ul>
        <li>Nom: 
            <b> {{ $equipe->nom}} </b>
        </li>

        <li>Capitaine:
            @foreach ($joueurs as $joueur)
                @if ($joueur->id == $equipe->id_capitaine)
                    {{ $joueur->pseudo }}
                @endif
            @endforeach
        </li>
        <li>Membres:
            <ul>
                @foreach ($joueurs as $joueur)
                    @if ($joueur->id != $equipe->id_capitaine)
                        <li>{{ $joueur->pseudo }}</li>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
    @if (count($joueurs) < 5)
        <a href="/equipes/{{ $equipe->id }}/add" class="btn btn-success">Ajouter des équipiers</a>
    @endif
    
    @isset($add)
        @include('equipe.add')
    @endisset

@endsection