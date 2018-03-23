@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-5">
                <h2>
                    <span class="text-danger">{{ $equipe->nom_equipe }}</span>
                </h2>
                <img src="{{ $equipe->avatar_equipe }}" class="img-fluid" style="max-width: 250px" alt="">

                <p class="mt-1">{{ $equipe->description }}</p>

                @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id)
                    <button type="button" class="btn btn-danger mt-2 mb-2" data-toggle="modal" data-target="#modal">
                        Modifer les informations
                    </button>
                @endif

            </div>
        <div class="col-lg-8 col-md-8 col-sm-8 table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Grade</th>
                        <th scope="col"></th>
                        <th scope="col">Pseudo</th>
                        @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id)
                            <th scope="col">Modifier</th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                    {{--  Ligne capitaine  --}}
                    <tr class="table-danger">
                        @if (\App\Models\User::find($equipe->getCapitaine()->id)->getRank())
                            <th scope="row"> {{ \App\Models\User::find($equipe->getCapitaine()->id)->getRank()->nom }} </th>
                            <td><img src="{{ \App\Models\User::find($equipe->getCapitaine()->id)->getRank()->image }}" alt=""></td>
                        @else
                            <th scope="row">Non renseigné...</th>
                            <th scope="row"></th>
                        @endif

                        <th scope="row">
                            <a href="/joueurs/{{ $equipe->getCapitaine()->id }}" class="text-white">{{ $equipe->getCapitaine()->pseudo }}</a>
                        </th>

                        @if (Auth::check() && Auth::user()->id == $equipe->getCapitaine()->id)
                            <th scope="row"></th>
                        @endif
                    </tr>

                    {{--  Lignes joueurs  --}}
                    @foreach ($equipe->getJoueurs() as $key=>$joueur)
                        <tr>
                            @if (\App\Models\User::find($joueur->id)->getRank())
                                <th scope="row"> {{ \App\Models\User::find($joueur->id)->getRank()->nom }} </th>
                                <td><img src="{{ \App\Models\User::find($joueur->id)->getRank()->image }}" alt=""></td>
                            @else
                                <th scope="row">Non renseigné...</th>
                                <th scope="row"></th>
                            @endif

                            <th scope="row">
                                <a href="/joueurs/{{$joueur->id}}" class="text-white">{{ $joueur->pseudo }}</a>  
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

        @include('equipe.edit')
    </div>
@endsection