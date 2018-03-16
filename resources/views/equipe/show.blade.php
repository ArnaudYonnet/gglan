@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-5">
                <img src="{{ $equipe->avatar_equipe }}" class="img-fluid" style="max-width: 250px" alt="">

                <h3>{{ $equipe->nom_equipe}} </h3>
                @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id && count($equipe->getJoueurs()) < 4)
                    @include('equipe.add')
                @endif

                @auth
                @if (Auth::user()->id == $equipe->getCapitaine()->id)
                    @if (count($equipe->getJoueurs()) == 4)

                        {{--  Refaire cette partie là en utilisant Equipe::isInscrit()  --}}
                        @if ($equipe->isInscrit())
                            Votre équipe est inscrite pour la prochaine LAN !

                        @endif

                        @isset($next_tournois)
                            @if ($next_tournois->status == "ouvert")
                                <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-danger mb-4">S'inscrire pour la prochaine LAN</a>
                            @else
                                <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-danger disabled mb-4">S'inscrire pour la prochaine LAN</a>
                            @endif
                        @else
                            <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-success disabled mb-4">S'inscrire pour la prochaine LAN</a>                    
                        @endisset
                    @endif
                @endif
            @endauth

                {{--  <a href="/profil/{{Auth::user()->id_public}}/edit" class="btn btn-danger" style="margin-top: 2vh;">
                    Modifier mes informations
                </a>  --}}
            </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Grade</th>
                        <th scope="col"></th>
                        <th scope="col">Pseudo</th>
                        @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id)
                            <th scope="col"></th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                    {{--  Ligne capitaine  --}}
                    <tr class="table-danger">
                        @if (\App\User::find($equipe->getCapitaine()->id)->getRank())
                            <th scope="row"> {{ \App\User::find($equipe->getCapitaine()->id)->getRank()->nom }} </th>
                            <td><img src="{{ \App\User::find($equipe->getCapitaine()->id)->getRank()->image }}" alt=""></td>
                        @else
                            <th scope="row">Non renseigné...</th>
                            <th scope="row"></th>
                        @endif

                        <th scope="row">
                            <a href="/joueurs/{{ $equipe->getCapitaine()->pseudo }}" class="text-white">{{ $equipe->getCapitaine()->pseudo }}</a>
                        </th>

                        <th scope="row"></th>
                    </tr>

                    {{--  Lignes joueurs  --}}
                    @foreach ($equipe->getJoueurs() as $key=>$joueur)
                        <tr>
                            @if (\App\User::find($joueur->id)->getRank())
                                <th scope="row"> {{ \App\User::find($joueur->id)->getRank()->nom }} </th>
                                <td><img src="{{ \App\User::find($joueur->id)->getRank()->image }}" alt=""></td>
                            @else
                                <th scope="row">Non renseigné...</th>
                                <th scope="row"></th>
                            @endif

                            <th scope="row">
                                <a href="/joueurs/{{$joueur->pseudo}}" class="text-white">{{ $joueur->pseudo }}</a>  
                            </th>

                            @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id)
                                <th scope="row">
                                    <a href="/equipes/{{$equipe->id}}/joueur/{{$joueur->id}}/delete" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                            @endif
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection