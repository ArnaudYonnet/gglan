@extends('layouts.admin.template') 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">CK Editor
                    <small>Advanced and full of features</small>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form class="form-horizontal" method="POST" action="/admin/articles/{{ $article->id }}/edit">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre" class="col-lg control-label">Titre</label>
                            <div class="col-lg-12">
                                <input id="titre" type="text" class="form-control" name="titre" value="{{ $article->titre_article }}" required autofocus>                                
                                @if ($errors->has('titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <textarea id="contenu" name="contenu" rows="10" cols="80" required > {{ $article->contenu_article }} </textarea>
                            <span class="help-block">
                                <strong>{{ $errors->first('contenu') }}</strong>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Ecrire l'article
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection