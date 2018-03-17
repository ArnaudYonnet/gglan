@extends('layouts.admin.template') 
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Jeux</h3>
                    <a href="/admin/jeux/create" class="btn btn-primary">Ajouter un jeu</a>
                </div>
                {{--
                <div class="box-body"> --}}
                    <table id="jeux" class="table table-hover">
                        <thead>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Nombre Joueur</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @foreach ($jeux as $key => $jeu)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{ $jeu->nom }} </td>
                                <td> {{ $jeu->description }} </td>
                                <td> {{ $jeu->nb_jeu }} </td>
                                <td> <a href="/admin/jeux/{{ $jeu->id }}/edit"><i class="fa fa-edit"></i></a> </td>
                                <td> <a href="/admin/jeux/{{ $jeu->id }}/delete"><i class="fa fa-trash"></i></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection