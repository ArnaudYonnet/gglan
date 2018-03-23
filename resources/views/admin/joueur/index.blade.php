@extends('layouts.admin.template') 
@section('title')
    Joueurs
@endsection
@section('subtitle')
    Gestion des joueurs 
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Joueurs</h3>
                    &nbsp &nbsp
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                        Ajouter un joueur
                    </button>
                </div>
                <div class="box-body table-responsive">
                    <table id="joueurs" class="table table-hover">
                        <thead>
                            {{--  <th>Id publique</th>  --}}
                            <th>Pseudo</th>
                            <th>E-mail</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @foreach ($joueurs as $joueur)
                            <tr>
                                {{--  <td> {{ $joueur->id_public }} </td>  --}}
                                <td> <a href="/joueurs/{{ $joueur->id }}" target="_blank">{{ $joueur->pseudo }}</a></td>
                                <td> {{ $joueur->email }} </td>
                                <td> {{ $joueur->description }} </td>
                                <td> <a href="/admin/joueurs/{{$joueur->id}}/edit"><i class="fa fa-edit"></i></a> </td>
                                <td> <a href="/admin/delete/joueurs/{{$joueur->id}}"><i class="fa fa-trash"></i></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.joueur.create')
@endsection