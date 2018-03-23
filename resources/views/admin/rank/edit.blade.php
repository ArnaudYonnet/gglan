@extends('layouts.admin.template')
@section('title')
    {{ $rank->nom }}
@endsection
@section('subtitle')
    Gestion du rank
@endsection 

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="box-title">{{ $rank->nom }}</div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" method="POST" action="/admin/ranks/{{ $rank->id }}/edit">
                        {{ csrf_field() }}
            
                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <label for="nom" class="col-md-4 control-label">Nom</label>
                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" name="nom" value="{{ $rank->nom }}" autofocus>                
                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
            
                        <div class="form-group{{ $errors->has('id_jeu') ? ' has-error' : '' }}">
                            <label for="id_jeu" class="col-md-4 control-label">Jeu</label>
                            <div class="col-md-6">
                                <select id="id_jeu" class="form-control" name="id_jeu">
                                    <option value="{{ $rank->id_jeu }}" selected> {{ \App\Models\Jeu::find($rank->id_jeu)->nom }} </option>
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
            
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>
                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control" name="image" value="{{ $rank->image }}" autofocus>                
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
                                    Modifier le rank
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