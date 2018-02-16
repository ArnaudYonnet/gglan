@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Equipes</h3>
            </div>
            {{--  <div class="box-body">  --}}
                <table id="equipes" class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Joueurs</th>
                        <th>Inscrit</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($equipes as $key => $equipe)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td><a href="/equipes/{{ $equipe->id }}/profil" target="_blank">{{ $equipe->nom }}</a></td>
                            <td>{{ $equipiers[$key]}} / 5</td>
                            @if ($inscrits[$key])
                            <td><span class="label label-success">Inscrit</span></td>
                            @else
                            <td><span class="label label-danger">Non inscrit</span></td>
                            @endif
                            <td> <a href="/admin/edit/equipes/{{$equipe->id}}"><i class="fa fa-edit"></i></a> </td>
                            <td>
                            <a href="/admin/delete/equipes/{{$equipe->id}}"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection