@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Partenaires</h3>
            </div>
            {{--
            <div class="box-body"> --}}
                <table id="equipes" class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Site</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($partenaires as $partenaire)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> <a href="/admin/partenaires/{{ $partenaire->id }}"> {{ $partenaire->nom_partenaire }} </a> </td>
                            <td> {{ $partenaire->site_partenaire }} </td>
                            <td> <a href="/admin/partenaires/edit/{{ $partenaire->id }}"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/partenaires/delete/{{ $partenaire->id }}"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection