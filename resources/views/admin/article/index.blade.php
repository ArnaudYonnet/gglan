@extends('admin.layouts.template')
@section('title')
    Articles
@endsection
@section('subtitle')
    Gestion des articles 
@endsection

@section('content')
@include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Articles</h3>
                <a href="/admin/articles/create" class="btn btn-primary">Ecrire un article</a>
            </div>
            <div class="box-body table-responsive">
                <table id="table" class="table table-hover">
                    <thead>
                        <th>Titre</th>
                        <th>Ecrit le</th>
                        <th>Auteur</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $article)
                        <tr>
                            <td> <a href="/admin/articles/{{ $article->id }}"> {{ $article->titre_article }} </a> </td>
                            <td> {{ \Carbon\Carbon::parse($article->date_article)->format('d/m/Y') }} </td>
                            <td> {{ \App\Models\User::find($article->id_user)->prenom }} </td>
                            <td> <a href="/admin/articles/{{ $article->id }}/edit"><i class="fa fa-edit"></i></a> </td>
                            <td> <a href="/admin/articles/{{ $article->id }}/delete"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection