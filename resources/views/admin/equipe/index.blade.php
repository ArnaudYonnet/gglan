@extends('admin.layouts.template')
@section('title')
    Equipes
@endsection
@section('subtitle')
    Gestion des equipes 
@endsection

@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Equipes</h3>
                &nbsp &nbsp
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                    Ajouter une équipe
                </button>
            </div>
            <div class="box-body table-responsive">
                <table id="table" class="table table-hover">
                    <thead>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Joueurs</th>
                        <th>Inscrit</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($equipes as $key => $equipe)
                        <tr>
                            <td><a href="/equipes/{{ $equipe->id }}" target="_blank">{{ $equipe->nom_equipe }}</a></td>
                            <td>{{ $equipe->description }}</td>
                            <td>{{ count($equipe->getJoueurs())+1 }} / 5</td>
                            @if (\App\Models\Tournois::isInscrit($equipe->id))
                            <td><span class="label label-success">Inscrit</span></td>
                            @else
                            <td><span class="label label-danger">Non inscrit</span></td>
                            @endif
                            <td> <a href="/admin/equipes/{{$equipe->id}}/edit"><i class="fa fa-edit"></i></a> </td>
                            <td>
                            <a href="/admin/equipes/{{$equipe->id}}/delete"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.equipe.create')
@endsection