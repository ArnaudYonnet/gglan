@extends('layouts.admin.template')
@section('title')
    Partenaires
@endsection
@section('subtitle')
    Gestion des partenaires 
@endsection 
 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Partenaires</h3>
                &nbsp &nbsp
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                    Ajouter un partenaire
                </button>
            </div>
            <div class="box-body table-responsive">
                <table id="equipes" class="table table-hover">
                    <thead>
                        <th>Nom</th>
                        <th>Site</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($partenaires as $key => $partenaire)
                        <tr>
                            <td> <a href="/admin/partenaires/{{ $partenaire->id }}"> {{ $partenaire->nom_partenaire }} </a> </td>
                            <td> <a href="{{ $partenaire->site_partenaire }}" target="_blank">{{ $partenaire->site_partenaire }}</a> </td>
                            <td> <a href="/admin/partenaires/{{ $partenaire->id }}/edit"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/partenaires/{{ $partenaire->id }}/delete"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.partenaire.create')
@endsection