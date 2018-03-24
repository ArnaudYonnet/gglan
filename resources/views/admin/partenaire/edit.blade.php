@extends('admin.layouts.template')
@section('title')
    {{ $partenaire->nom_partenaire }}
@endsection
@section('subtitle')
    Gestion du partenaire
@endsection

@section('content')
@include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header">
                <div class="box-title">{{ $partenaire->nom_partenaire }}</div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST" action="/admin/partenaires/{{ $partenaire->id }}/edit">
                    {{ csrf_field() }}
            
                    <div class="form-group{{ $errors->has('nom_partenaire') ? ' has-error' : '' }}">
                        <label for="nom_partenaire" class="col-md-4 control-label">Nom Partenaire</label>
                        <div class="col-md-6">
                            <input id="nom_partenaire" type="text" class="form-control" name="nom_partenaire"  value="{{ $partenaire->nom_partenaire }}" required autofocus> 
                            @if ($errors->has('nom_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nom_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
            
                    <div class="form-group{{ $errors->has('site_partenaire') ? ' has-error' : '' }}">
                        <label for="site_partenaire" class="col-md-4 control-label">Site Partenaire</label>
                        <div class="col-md-6">
                            <input id="site_partenaire" type="text" class="form-control" name="site_partenaire" value="{{ $partenaire->site_partenaire }}" placeholder="Ex: https://site.partenaire.com"> 
                            @if ($errors->has('site_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('site_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
            
                    <div class="form-group{{ $errors->has('img_partenaire') ? ' has-error' : '' }}">
                        <label for="img_partenaire" class="col-md-4 control-label">Logo Partenaire</label>
                        <div class="col-md-6">
                            <input id="img_partenaire" type="text" class="form-control" name="img_partenaire" value="{{ $partenaire->img_partenaire }}" placeholder="Ex: https://imgur.com/"> 
                            @if ($errors->has('img_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('img_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection