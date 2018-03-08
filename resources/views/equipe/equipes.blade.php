@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::view')
<div class="row">
    <br />
    <h3>Place equipe restantes: <b>{{16-count($equipes)}}</b></h3>

    <div class="col-lg-11">
        <div class="card-columns">
            @foreach ($equipes as $equipe)
                <div class="card w-80" >
                    <h5 class="card-header">
                        <a href="/equipes/{{ $equipe->id }}/profil" class="text-danger"> {{ $equipe->nom_equipe }} </a>
                    </h5>
                    <div class="card-body">
                        <img class="card-img-top img-fluid" src="/img/profil.png" alt="{{ $equipe->nom_equipe }}">
                        <p></p>
                        @foreach ($joueurs as $joueur)   
                            @if ($equipe->id == $joueur->id_equipe)
                            <h6 class="card-subtitle mb-2 text-muted">{{ $joueur->pseudo }}</h6>   
                            @endif                      
                        @endforeach
                        <p class="card-text"> {{ $equipe->description }} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    

@endsection