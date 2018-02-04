@extends('layouts.template')


@section('title')
    GG-LAN
@endsection


@section('content')
{{--  @include('flash::message')  --}}
@include('sweetalert::view')
    <div class="container col-lg-6">
        <ul class="list-unstyled">
            <li>Nom: 
                <b> {{ $equipe->nom}} </b>
            </li>
            {{--  <li>Capitaine:
                @foreach ($joueurs as $joueur)
                    @if ($joueur->id == $equipe->id_capitaine)
                        <b> {{ $joueur->pseudo }} </b>
                    @endif
                @endforeach
            </li>  --}}
            {{--  <li>Membres:
                <ul>
                    @foreach ($joueurs as $joueur)
                        @if ($joueur->id != $equipe->id_capitaine)
                            <li><b> {{ $joueur->pseudo }} </b></li>
                        @endif
                    @endforeach
                </ul>
            </li>  --}}
        </ul>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">Grade</th>
                <th scope="col"></th>
                <th scope="col">Pseudo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $key=>$joueur)
                    @if ($joueur->id == $equipe->id_capitaine)
                        <tr class="bg-danger">
                            @if ($ranks[$key] != null)
                                    <th scope="row"> {{ $ranks[$key]->nom }} </th>
                                    <td><img src="{{ $ranks[$key]->image }}" alt=""></td>
                                @else
                                    <td></td>
                                    <th scope="row">Non renseigné</th>
                                @endif
                            <th scope="row">
                                <a href="/joueurs/{{$joueur->pseudo}}">{{ $joueur->pseudo }}</a>  
                            </th>
                        </tr>
                    @else
                        <tr>
                            @if ($ranks[$key] != null)
                                    <th scope="row"> {{ $ranks[$key]->nom }} 
                                    </th>
                                    <td><img src="{{ $ranks[$key]->image }}" alt=""></td>
                                @else
                                <th scope="row">Non renseigné</th>
                                    <td></td>
                                @endif
                            <th scope="row">
                                <a href="/joueurs/{{$joueur->pseudo}}">{{ $joueur->pseudo }}</a>  
                            </th>
                        </tr>
                    @endif
                @endforeach
                
               
            </tbody>
        </table>



        <a href="/equipes/{{ $equipe->id }}/edit" class="btn btn-success">Modifier mon équipe</a>
        @if (count($joueurs) < 5)
            <a href="/equipes/{{ $equipe->id }}/add" class="btn btn-success">Ajouter des équipiers</a>
        @endif
    </div>

    <div class="container col-lg-6">
        @isset($add)
            @include('equipe.add')
        @endisset
    </div>

@endsection