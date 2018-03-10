@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-5">
                <img src="{{ $equipe->avatar_equipe }}" class="img-fluid" style="max-width: 250px" alt="">

                <h3>{{ $equipe->nom_equipe}} </h3>
                @if (count($joueurs) < 5)
                    @include('equipe.add')
                @endif

                @auth
                @if (Auth::user()->id == $equipe->id_capitaine)
                    @if (count($joueurs) == 5)
                        @isset($participe)
                            Votre équipe est inscrite pour la prochaine GG-LAN !
                        @else
                            @isset($next_tournois)
                                @if ($next_tournois->status == "ouvert")
                                    <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-danger mb-4">S'inscrire pour la prochaine LAN</a>
                                @else
                                    <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-danger disabled mb-4">S'inscrire pour la prochaine LAN</a>
                                @endif
                            @else
                                <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-success disabled mb-4">S'inscrire pour la prochaine LAN</a>                    
                            @endisset
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
                        @if (Auth::check())
                            @if (Auth::user()->id == $equipe->id_capitaine)
                                <th scope="col"></th>
                            @endif
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($joueurs as $key=>$joueur)
                        @if ($joueur->id_user == $equipe->id_capitaine)
                            <tr class="table-danger">
                                @if ($ranks[$key] != null)
                                    <th scope="row"> {{ $ranks[$key]->nom }} </th>
                                    <td><img src="{{ $ranks[$key]->image }}" alt=""></td>
                                @else
                                    <th scope="row">Non renseigné...</th>
                                    <td></td>
                                @endif
                                <th scope="row">
                                    <a href="/joueurs/{{$joueur->pseudo}}" class="text-white">{{ $joueur->pseudo }}</a>  
                                </th>
                                @if (Auth::check())
                                    @if (Auth::user()->id == $equipe->id_capitaine)
                                        <th></th>
                                    @endif
                                @endif
                            </tr>
                        @else
                            <tr>
                                @if ($ranks[$key] != null)
                                    <th scope="row"> {{ $ranks[$key]->nom }} </th>
                                    <td><img src="{{ $ranks[$key]->image }}" alt=""></td>
                                @else
                                    <th scope="row">Non renseigné</th>
                                    <td></td>
                                @endif
                                <th scope="row">
                                    <a href="/joueurs/{{$joueur->pseudo}}" class="text-white">{{ $joueur->pseudo }}</a>  
                                </th>
                                    
                                @if (Auth::check())
                                    @if (Auth::user()->id == $equipe->id_capitaine)
                                        <th>
                                            <a href="/equipes/{{$equipe->id}}/delete/joueur/{{$joueur->id_user}}" class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </th>
                                    @endif
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection