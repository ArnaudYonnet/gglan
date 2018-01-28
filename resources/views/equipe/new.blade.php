@extends('layouts.template')

@section('title')
    GGLAN
@endsection

@section('content')
    @guest
    @else
        <form class="form-horizontal" method="POST" action="/equipes/new">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="col-md-4 control-label">Nom</label>

                <div class="col-md-6">
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
                <div class="col-md-6">
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
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Créer mon équipe
                    </button>
                </div>
            </div>
    </form>
    @endguest
    
@endsection