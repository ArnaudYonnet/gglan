@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::view')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h3>{{ $equipe->nom_equipe}} </h3>
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
                                    <th scope="row">Non renseigné</th>
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

        <div class="col-lg-8 col-md-8 col-sm-8">
            @auth
                @if (Auth::user()->id == $equipe->id_capitaine)
                    @if (count($joueurs) < 5)
                        @include('equipe.add')
                    @endif
                    @if (count($joueurs) == 5)
                    @isset($participe)
                        Votre équipe est inscrite pour la prochaine GG-LAN !
                    @else
                        @isset($tournois)
                            @if ($tournois->status == "ouvert")
                                <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-success">S'inscrire pour la prochaine LAN</a>
                            @else
                                <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-success disabled">S'inscrire pour la prochaine LAN</a>
                            @endif
                        @else
                            <a href="/tournois/inscription/{{$equipe->id}}" class="btn btn-success disabled">S'inscrire pour la prochaine LAN</a>                    
                        @endisset
                    @endisset
                    @endif
                @endif
            @endauth
        </div>
    </div>
@endsection