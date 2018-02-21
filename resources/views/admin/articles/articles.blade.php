@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Articles</h3>
            </div>
            {{--
            <div class="box-body"> --}}
                <table id="equipes" class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Ecrit le</th>
                        <th>Auteur</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $article)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> <a href="/admin/articles/{{ $article->id_article }}"> {{ $article->titre_article }} </a> </td>
                            <td> {{ \Carbon\Carbon::parse($article->date_article)->format('d/m/Y') }} </td>
                            <td> {{ $article->prenom }} </td>
                            <td> <a href="/admin/articles/edit/{{ $article->id_article }}"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/articles/delete/{{ $article->id_article }}"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection