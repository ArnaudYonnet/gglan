@extends('layouts.admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Joueurs</h3>
                </div>
                <div class="box-body">
                    <table id="joueurs" class="table table-hover">
                        <thead>
                            <th>Id publique</th>
                            <th>Pseudo</th>
                            <th>E-mail</th>
                            {{--  <th>Modifier</th>
                            <th>Supprimer</th>  --}}
                        </thead>
                        <tbody>
                            @foreach ($joueurs as $joueur)
                                <tr>
                                    <td> {{ $joueur->id_public }} </td>
                                    <td><a href="/joueurs/{{ $joueur->pseudo }}" target="_blank">{{ $joueur->pseudo }}</a></td>
                                    <td> {{ $joueur->email }} </td>
                                    {{--  <td> <a href="/admin/edit/joueur/{{$joueur->id}}"><i class="fa fa-edit"></i></a> </td>
                                    <td> <a href="/admin/delete/joueur/{{$joueur->id}}"><i class="fa fa-trash"></i></a> </td>  --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Equipes</h3>
                </div>
                <div class="box-body">
                    <table id="equipes" class="table table-hover">
                        <thead>
                            <th>Nom</th>
                            <th>Joueurs</th>
                            <th>Inscrit</th>
                            {{--  <th>Modifier</th>  --}}
                            {{--  <th>Supprimer</th>  --}}
                        </thead>
                        <tbody>
                            @foreach ($equipes as $key => $equipe)
                                <tr>
                                    <td><a href="/equipes/{{ $equipe->id }}/profil" target="_blank">{{ $equipe->nom_equipe }}</a></td>
                                    <td>{{ $equipiers[$key]}} / 5</td>
                                    @if ($inscrits[$key])
                                        <td><span class="label label-success">Inscrit</span></td>
                                    @else
                                        <td><span class="label label-danger">Non inscrit</span></td>
                                    @endif
                                    {{--  <td> <a href="/admin/edit/equipe/{{$equipe->id}}"><i class="fa fa-edit"></i></a> </td>  --}}
                                    {{--  <td> <a href="/admin/delete/equipe/{{$equipe->id}}"><i class="fa fa-trash"></i></a> </td>  --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection