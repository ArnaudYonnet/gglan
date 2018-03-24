@extends('admin.layouts.template')
@section('title')
    {{ $tournois->nom_tournois }}
@endsection
@section('subtitle')
    Gestion du tournois
@endsection

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="box-title">{{ $tournois->nom_tournois }}</div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" method="POST" action="/admin/tournois/{{ $tournois->id }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{ $tournois->id }}">
                        <input type="hidden" name="id_jeu" value="{{ $tournois->id_jeu }}">
        
        
                        <div class="form-group{{ $errors->has('nom_tournois') ? ' has-error' : '' }}">
                            <label for="nom_tournois" class="col-md-4 control-label">Nom</label>
                            <div class="col-md-6">
                                <input id="nom_tournois" type="text" class="form-control" name="nom_tournois" value="{{ $tournois->nom_tournois }}" autofocus>                
                                @if ($errors->has('nom_tournois'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom_tournois') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('date_deb') ? ' has-error' : '' }}">
                            <label for="date_deb" class="col-md-4 control-label">Date de début</label>
                            <div class="col-md-6 input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="date_deb" type="date" class="form-control" name="date_deb" value="{{ $tournois->date_deb }}" >                
                                @if ($errors->has('date_deb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_deb') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('date_fin') ? ' has-error' : '' }}">
                            <label for="date_fin" class="col-md-4 control-label">Date de fin</label>
                            <div class="col-md-6 input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="date_fin" type="date" class="form-control pull-right" name="date_fin" value="{{ $tournois->date_fin }}" >                
                                @if ($errors->has('date_fin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_fin') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control" row="10" spellcheck="true">{{ $tournois->description }}</textarea>            
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('place_equipe') ? ' has-error' : '' }}">
                            <label for="place_equipe" class="col-md-4 control-label">Place equipe</label>
                            <div class="col-md-6">
                                <input id="place_equipe" type="number" min="0" class="form-control" name="place_equipe" value="{{ $tournois->place_equipe }}" autofocus>                
                                @if ($errors->has('place_equipe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place_equipe') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('id_jeu') ? ' has-error' : '' }}">
                            <label for="id_jeu" class="col-md-4 control-label">Jeu</label>
                            <div class="col-md-6">
                                <select id="id_jeu" class="form-control" name="id_jeu">
                                    <option value="{{ \App\Models\Jeu::find($tournois->id_jeu)->id }}" selected> {{\App\Models\Jeu::find($tournois->id_jeu)->nom}} </option>
                                    @foreach ($jeux as $jeu)
                                        <option value="{{ $jeu->id }}"> {{ $jeu->nom }} </option>
                                    @endforeach
                                </select> @if ($errors->has('id_jeu'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_jeu') }}</strong>
                                </span> @endif
                            </div>
                        </div>
        
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status">
                                    @if ($tournois->status == "ouvert")
                                        <option value="ouvert" selected>Ouvert</option>
                                        <option value="ferme">Fermé</option>
                                    @else
                                        <option value="ouvert" >Ouvert</option>
                                        <option value="ferme" selected>Fermé</option>
                                    @endif
                                </select> @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        
        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Modifier le tournois
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