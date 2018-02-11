@extends('layouts.admin.template')

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-10">
            
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tournois</h3>
                </div>
                <div class="box-body">
                    <table id="tournois" class="table table-bordered table-hover">
                        <thead>
                            {{--  <th>#</th>  --}}
                            <th>Etat</th>
                            <th>Tournois</th>
                            <th>Description</th>
                            <th>Jeu</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($tournois as $key => $tournoi)
                                <tr>
                                    {{--  <td> {{ $key+1 }} </td>  --}}
                                    @if ($tournoi->status == "ouvert")
                                    <td><span class="label label-success">Ouvert</span></td>
                                    @else
                                    <td><span class="label label-danger">Fermé</span></td>
                                    @endif {{--
                                    <td> {{ $tournoi->status }} </td> --}}
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
        </div>
    </div>
@endsection