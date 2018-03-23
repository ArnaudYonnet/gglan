@extends('layouts.admin.template') 

@section('content')
@include('sweetalert::view')
    <div class="row">
        <form class="form-horizontal" method="POST" action="/admin/equipes/{{ $equipe->id }}">
            {{ csrf_field() }}
            
            <div class="form-group{{ $errors->has('nom_equipe') ? ' has-error' : '' }}">
                <label for="nom_equipe" class="col-md-4 control-label">Nom</label>
                <div class="col-md-6">
                    <input id="nom_equipe" type="text" class="form-control" name="nom_equipe" value="{{ $equipe->nom_equipe}}" required autofocus>
                    @if ($errors->has('nom_equipe'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom_equipe') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea name="description" id="description" class="form-control" row="10" required> {{ $equipe->description }} </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('avatar_equipe') ? ' has-error' : '' }}">
                <label for="avatar_equipe" class="col-md-4 control-label">Avatar</label>
                <div class="col-md-6">
                    <input id="avatar_equipe" type="text" class="form-control" name="avatar_equipe" value="{{ $equipe->avatar_equipe}}" required>
                    @if ($errors->has('avatar_equipe'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar_equipe') }}</strong>
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