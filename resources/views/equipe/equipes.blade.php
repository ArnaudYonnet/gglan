@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::cdn')
@include('sweetalert::view')
    <ul class="list-unstyled list-inline">
        @foreach ($equipes as $equipe)
            <li class="list-inline-item">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/equipes/{{ $equipe->id }}/profil"> {{ $equipe->nom }} </a>
                        </h5>
                         @foreach ($joueurs as $joueur)   
                            @if ($equipe->id == $joueur->id_equipe)
                                <h6 class="card-subtitle mb-2 text-muted">{{ $joueur->pseudo }}</h6>   
                            @endif                      
                        @endforeach
                        <p class="card-text"> {{ $equipe->description }} </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endsection