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
                    <p class="lead">
                        <a class="btn btn-info btn-lg" href="#" role="button">Nous inscrire !</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection