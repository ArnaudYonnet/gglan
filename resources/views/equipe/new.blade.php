@extends('layouts.template')

@section('title')
    GGLAN
@endsection

@section('content')
    @auth
        <form class="form-horizontal" method="POST" action="/equipes/new">
            {{ csrf_field() }}
            <legend>Créer votre equipe</legend>

            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="col-md-4 control-label">Nom</label>

                <div class="col-md-4">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" autofocus>

                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jeu') ? ' has-error' : '' }}">
                <label for="jeu" class="col-md-4 control-label">Jeu</label>
                <div class="col-md-4">
                    <select id="jeu" class="form-control" name="jeu">
                        <option selected disabled >-- JEU --</option>
                        @foreach ($jeux as $jeu)
                            <option value="{{ $jeu->id }}"> {{ $jeu->nom }} </option>
                        @endforeach
                    </select>

                    @if ($errors->has('jeu'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jeu') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('avatar_equipe') ? ' has-error' : '' }}">
                <label for="avatar_equipe" class="col-md-4 control-label">Avatar de l'équipe</label>

                <div class="col-md-4">
                    <input id="avatar_equipe" type="text" class="form-control" name="avatar_equipe" value="{{ old('avatar_equipe') }}" placeholder="https://imgur.com" required>

                    @if ($errors->has('avatar_equipe'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar_equipe') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-danger">
                        Créer mon équipe
                    </button>
                </div>
            </div>
    </form>
    @endauth
    
@endsection