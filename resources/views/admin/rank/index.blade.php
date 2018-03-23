@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ranks</h3>
                &nbsp &nbsp
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                    Ajouter un rank
                </button>
            </div>
            <div class="box-body table-responsive">
                <table id="table" class="table table-hover">
                    <thead>
                        <th>Jeu</th>
                        <th>Nom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($ranks as $key => $rank)
                        <tr>
                            <td> {{ \App\Models\Jeu::find($rank->id_jeu)->nom }} </td>
                            <td> {{ $rank->nom }} </td>
                            <td> <a href="/admin/ranks/{{ $rank->id }}/edit"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/ranks/{{ $rank->id }}/delete"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.rank.create')
@endsection