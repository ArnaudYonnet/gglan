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
                            <th>Type</th>
                        </thead>
                        <tbody>
                            @foreach ($inscrits as $inscrit)
                                <tr>
                                    <td> {{ $inscrit->id_public }} </td>
                                    <td><a href="/joueurs/{{ $inscrit->id }}" target="_blank">{{ $inscrit->pseudo }}</a></td>
                                    <td> {{ $inscrit->email }} </td>
                                    <td> {{ $inscrit->type }} </td>
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
                        </thead>
                        <tbody>
                            @foreach ($equipes as $key => $equipe)
                                <tr>
                                    <td><a href="/equipes/{{ $equipe->id }}" target="_blank">{{ $equipe->nom_equipe }}</a></td>
                                    <td>{{ $equipiers[$key]}} / 5</td>
                                    @if ($inscritsTournois[$key])
                                        <td><span class="label label-success">Inscrit</span></td>
                                    @else
                                        <td><span class="label label-danger">Non inscrit</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection