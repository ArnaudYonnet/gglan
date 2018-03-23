@extends('layouts.admin.template')
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
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">CK Editor
                    <small>Advanced and full of features</small>
                </h3>
            </div>
            <div class="box-body pad">
                <form class="form-horizontal" method="POST" action="/admin/articles">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                        <label for="titre" class="col-lg control-label">Titre</label>
                        <div class="col-lg-12">
                            <input id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}" required autofocus>                                
                            @if ($errors->has('titre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('titre') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <textarea id="contenu" name="contenu" rows="10" cols="80" required ></textarea>
                            <span class="help-block">
                                <strong>{{ $errors->first('contenu') }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-lg control-label">Image de couverture</label>
                        <div class="col-lg-12">
                            <input id="image" type="text" class="form-control" name="image" value="{{ old('image') }}"  placeholder="https://imgur.com" required >                                
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span> 
                            @endif
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