@extends('layouts.admin.template')
@section('title')
    Tournois
@endsection
@section('subtitle')
    Gestion des tournois 
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tournois</h3>
                    &nbsp &nbsp
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                        Ajouter un tournois
                    </button>
                </div>
                <div class="box-body table-responsive">
                    <table id="tournois" class="table table-hover">
                        <thead>
                            <th>Etat</th>
                            <th>Date</th>
                            <th>Tournois</th>
                            <th>Description</th>
                            <th>Place Equipe</th>
                            <th>Jeu</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @foreach ($tournois as $key => $tournoi)
                                <tr>
                                    @if ($tournoi->status == "ouvert")
                                        <td><span class="label label-success">Ouvert</span></td>
                                    @else
                                        <td><span class="label label-danger">Fermé</span></td>
                                    @endif
                                    <td> 
                                        {{ \Carbon\Carbon::parse($tournoi->date_deb)->format('d/m/Y') }} |
                                        {{ \Carbon\Carbon::parse($tournoi->date_deb)->diffInDays(\Carbon\Carbon::parse($tournoi->date_fin))+1 }} 
                                        jour(s)
                                    </td>
                                    <td> {{ $tournoi->nom_tournois }} </td>
                                    <td> {{ $tournoi->description }} </td>
                                    <td> {{ $tournoi->place_equipe }} </td>
                                    <td> {{ \App\Models\Jeu::find($tournoi->id_jeu)->nom }} </td>
                                    <td>
                                        <a id="edit" href="/admin/tournois/{{$tournoi->id}}/edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a id="delete" href="/admin/tournois/{{$tournoi->id}}/delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.tournois.create')
@endsection