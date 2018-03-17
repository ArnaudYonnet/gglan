@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-11">
            @foreach ($tournois as $tournoi)
                <div class="jumbotron">
                    <h1 class="display-4">
                        {{ $tournoi->nom_tournois }}
                        <span class="badge badge-danger">
                            {{ count($tournoi->getInscrits()) }} / {{ $tournoi->place_equipe }}
                        </span>
                    </h1>
                    <p class="lead">{{ $tournoi->description }}</p>
                    <hr class="my-4">
                    <p>Jeux: <b>{{ \App\Jeu::find($tournoi->id_jeu)->nom }}</b> </p>

                    @if (Auth::check() && \App\Tournois::isInscrit(\App\User::find(Auth::id())->getEquipe()->id)
                    && Auth::id() == \App\Equipe::find(\App\User::find(Auth::id())->getEquipe()->id)->getCapitaine()->id )
                    
                        <p class="lead">
                            <a class="btn btn-info btn-lg disabled" role="button">Nous inscrire !</a>
                        </p>
                    @else
                        <p class="lead">
                            <a class="btn btn-info btn-lg" href="/tournois/{{ $tournoi->id }}/equipe/{{ App\User::find(Auth::id())->getEquipe()->id }}/inscription" role="button">Nous inscrire !</a>
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection