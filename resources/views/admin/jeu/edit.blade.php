@extends('admin.layouts.template')
@section('title')
    {{ $jeu->nom }}
@endsection
@section('subtitle')
    Gestion du jeu
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header">
                <div class="box-title">{{ $jeu->nom }}</div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST" action="/admin/jeux/{{ $jeu->id }}/edit">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                        <label for="nom" class="col-md-4 control-label">Nom</label>
                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ $jeu->nom }}" autofocus required>                
                            @if ($errors->has('nom'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
        
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control" row="10" spellcheck="true" required>{{ $jeu->description }}</textarea>            
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
        
                    <div class="form-group{{ $errors->has('nb_jeu') ? ' has-error' : '' }}">
                        <label for="nb_jeu" class="col-md-4 control-label">Nombre de joueur (Par équipe)</label>
                        <div class="col-md-6">
                            <input id="nb_jeu" type="number" class="form-control" name="nb_jeu" value="{{ $jeu->nb_jeu }}" required>                
                            @if ($errors->has('nb_jeu'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nb_jeu') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
                    
        
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                Modifier le jeu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection