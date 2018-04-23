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
                    <p>Jeux: <b>{{ \App\Models\Jeu::find($tournoi->id_jeu)->nom }}</b> </p>
                    <p>Equipes inscrites:</p>
                    <div class="col-lg-2">
                        <ul class="list-unstyled list-inline">
                            @foreach ($tournoi->getInscrits() as $equipe)
                                <li class="list-inline-item">
                                    <a href="/equipes/{{ $equipe->id_equipe }}" class="text-danger">{{ \App\Models\Equipe::find($equipe->id_equipe)->nom_equipe }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="/equipes/{{ $equipe->id_equipe }}" class="text-danger">{{ \App\Models\Equipe::find($equipe->id_equipe)->nom_equipe }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="/equipes/{{ $equipe->id_equipe }}" class="text-danger">{{ \App\Models\Equipe::find($equipe->id_equipe)->nom_equipe }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="/equipes/{{ $equipe->id_equipe }}" class="text-danger">{{ \App\Models\Equipe::find($equipe->id_equipe)->nom_equipe }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @guest
                    @else
                        {{--  Tournois complet  --}}
                        @if (count($tournoi->getInscrits()) == $tournoi->place_equipe)
                            <p class="lead">
                                <a class="btn btn-info btn-lg disabled" role="button">Complet !</a>
                            </p>
                        @else

                            {{--  Si une équipe & capitaine  --}}
                            @if (Auth::check() 
                            && \App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe())
                            && Auth::id() == \App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe()->id)->getCapitaine()->id)

                                @if (\App\Models\Tournois::isInscrit(\App\Models\User::find(Auth::id())->getEquipe()->id))

                                    @if (\App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe()->id)->getInscription()->id_tournois == $tournoi->id)
                                        <p class="lead">
                                            <a class="btn btn-info btn-lg" 
                                                href="/tournois/{{ $tournoi->id }}/equipe/{{ App\Models\User::find(Auth::id())->getEquipe()->id }}/delete" 
                                                role="button">Nous désinscrire...
                                            </a>
                                        </p>                            
                                    @else
                                        <p class="lead">
                                            <a class="btn btn-info btn-lg disabled" role="button">Nous inscrire !</a>
                                        </p>
                                    @endif
                                @else
                                    @if (count(\App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe()->id)->getJoueurs()) == 4)
                                        <p class="lead">
                                            <a class="btn btn-info btn-lg" 
                                                href="/tournois/{{ $tournoi->id }}/equipe/{{ App\Models\User::find(Auth::id())->getEquipe()->id }}/inscription" 
                                                role="button">Nous inscrire !
                                            </a>
                                        </p>
                                    @else
                                        <p class="lead">
                                            <a class="btn btn-info btn-lg disabled" role="button">Votre équipe n'est pas complète !</a>
                                        </p>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endguest

                </div>
            @endforeach
        </div>
    </div>
@endsection