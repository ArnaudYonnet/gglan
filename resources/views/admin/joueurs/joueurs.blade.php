@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Joueurs</h3>
            </div>
            <div class="box-body">
                <table id="joueurs" class="table table-bordered table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Pseudo</th>
                        <th>E-mail</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($joueurs as $joueur)
                        <tr>
                            <td> {{ $joueur->id_public }} </td>
                            <td> {{ $joueur->pseudo }} </td>
                            <td> {{ $joueur->email }} </td>
                            <td> <a href="/admin/edit/joueurs/{{$joueur->id}}"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/delete/joueurs/{{$joueur->id}}"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection