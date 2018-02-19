@extends('layouts.admin.template')

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Equipes Inscrites</h3>
                </div>
                <div class="box-body">
                    <table id="tournois" class="table table-hover">
                        <thead>
                            {{--  <th>#</th>  --}}
                            <th>Equipe</th>
                            <th>Jeu</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @foreach ($inscrits as $key => $inscrit)
                                <tr>
                                   <td> {{ $inscrit->nom_equipe }} </td>
                                   <td> CS:GO </td>
                                    <td>
                                        <a id="edit" href="#"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a id="delete" href="#"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection