@extends('layouts.admin.template')

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-10">
            <legend>Tournois</legend>
            <table class="table table-hover table-dark">
                <thead>
                    <th>#</th>
                    <th>Etat</th>
                    <th>Tournois</th>
                    <th>Description</th>
                    <th>Jeu</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    @foreach ($tournois as $key => $tournoi)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            @if ($tournoi->status == "ouvert")
                                <td><span class="label label-success">Ouvert</span></td>
                            @else
                                <td><span class="label label-danger">Fermé</span></td>
                            @endif
                            {{--  <td> {{ $tournoi->status }} </td>  --}}
                            <td> {{ $tournoi->nom }} </td>
                            <td> {{ $tournoi->description }} </td>
                            <td> {{ $jeux[$key] }} </td>
                            <td>
                                <a href="/admin/edit/tournois/{{$tournoi->id}}"><i class="fa fa-edit"></i></a> &nbsp
                                <a href="/admin/delete/tournois/{{$tournoi->id}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection