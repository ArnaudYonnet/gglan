@extends('layouts.admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <legend>Joueurs</legend>
            <table class="table table-hover table-dark">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Edit</th>
                </thead>
                <tbody>
                    @foreach ($joueurs as $joueur)
                        <tr>
                            <th scope="row"> {{ $joueur->id_public }} </th>
                            <th scope="row">{{ $joueur->pseudo }}</th>
                            <th scope="row"> {{ $joueur->email }} </th>
                            <td>
                                <a href="/admin/edit/joueur/{{$joueur->id}}"><i class="fa fa-edit"></i></a>
                                &nbsp
                                <a href="/admin/delete/joueur/{{$joueur->id}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <legend>Equipes</legend>
            <table class="table table-hover table-dark">
                <thead>
                    <th scope="col">Nom</th>
                    <th scope="col">Joueurs</th>
                    <th scope="col">Edit</th>
                </thead>
                <tbody>
                    @foreach ($equipes as $key => $equipe)
                    <tr>
                        <th scope="row"> {{ $equipe->nom }} </th>
                        <th scope="row">{{ $equipiers[$key]}} / 5</th>
                        <td>
                            <a href="/admin/edit/equipe/{{$equipe->id}}"><i class="fa fa-edit"></i></a> &nbsp
                            <a href="/admin/delete/equipe/{{$equipe->id}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection