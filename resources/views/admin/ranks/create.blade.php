@extends('layouts.admin.template') 

@section('content')
<div class="row">
    <div class="col-lg-10">
        <legend>Ajouter un jeu</legend>
        <form class="form-horizontal" method="POST" action="/admin/ranks">
            {{ csrf_field() }}
            
            <div class="form-group{{ $errors->has('id_jeu') ? ' has-error' : '' }}">
                <label for="id_jeu" class="col-md-4 control-label">Jeu</label>
                <div class="col-md-6">
                    <select id="id_jeu" class="form-control" name="id_jeu" required autofocus>
                        <option selected disabled >-- JEU --</option>
                        @foreach ($jeux as $jeu)
                            <option value="{{ $jeu->id }}"> {{ $jeu->nom }} </option>
                        @endforeach
                    </select> 
                        @if ($errors->has('id_jeu'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_jeu') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="col-md-4 control-label">Nom</label>
                <div class="col-md-6">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}">                
                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image" class="col-md-4 control-label">Image</label>
                <div class="col-md-6">
                    <input id="image" type="text" class="form-control" name="image" value="{{ old('image') }}">                
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success">
                        Ajouter le rank
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection