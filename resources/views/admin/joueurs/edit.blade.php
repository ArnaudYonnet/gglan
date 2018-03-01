@extends('layouts.admin.template') 

@section('content')
@include('sweetalert::view')
    <div class="row">
        <form class="form-horizontal" method="POST" action="/admin/edit/joueurs/{{ $inscrit->id }}">
            {{ csrf_field() }}
            
            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="col-md-4 control-label">Nom</label>
                <div class="col-md-6">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{ $inscrit->nom}}" autofocus>
                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                <label for="prenom" class="col-md-4 control-label">Prenom</label>
                <div class="col-md-6">
                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $inscrit->prenom}}" >
                    @if ($errors->has('prenom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prenom') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea name="description" id="description" class="form-control" row="10"> {{ $inscrit->description }} </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                <label for="pseudo" class="col-md-4 control-label">Pseudo</label>
                <div class="col-md-6">
                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ $inscrit->pseudo}}" >
                    @if ($errors->has('pseudo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pseudo') }}</strong>
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
@endsection