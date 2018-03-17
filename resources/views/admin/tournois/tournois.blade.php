@extends('layouts.admin.template')

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tournois</h3>
                </div>
                <div class="box-body">
                    <table id="tournois" class="table table-hover">
                        <thead>
                            <th>#</th>
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
                                    <td> {{ $key+1 }} </td>
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
                                    <td> {{ \App\Jeu::find($tournoi->id_jeu)->nom }} </td>
                                    <td>
                                        <a id="edit" href="/admin/edit/tournois/{{$tournoi->id}}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a id="delete" href="/admin/delete/tournois/{{$tournoi->id}}"><i class="fa fa-trash"></i></a>
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