@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <a href="/admin/articles" class="btn btn-success">
                    <i class="fa fa-arrow-left"> </i> Retour au articles
                </a>
                <h3 class="box-title"> {{ $article->titre_article }} </h3>
            </div>
                {!! $article->contenu_article !!}
            </div>
        </div>
    </div>
</div>
@endsection