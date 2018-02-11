@extends('layouts.admin.template') 

@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-10">
            <legend>Modification de {{ $tournois->nom }} </legend>
            <form class="form-horizontal" method="POST" action="/admin/edit/tournois/{{ $tournois->id }}">
                {{ csrf_field() }}
                
                <input type="hidden" name="id_tournois" value="{{ $tournois->id }}">
                <input type="hidden" name="id_jeu" value="{{ $jeu_tournois->id }}">


                <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                    <label for="nom" class="col-md-4 control-label">Nom</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control" name="nom" value="{{ $tournois->nom }}" autofocus>                
                        @if ($errors->has('nom'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nom') }}</strong>
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

                <div class="form-group{{ $errors->has('id_jeu') ? ' has-error' : '' }}">
                    <label for="id_jeu" class="col-md-4 control-label">Jeu</label>
                    <div class="col-md-6">
                        <select id="id_jeu" class="form-control" name="id_jeu">
                            <option value="{{ $jeu_tournois->id }}" selected> {{$jeu_tournois->nom}} </option>
                            @foreach ($jeux as $jeu)
                                @if ($jeu->nom != $jeu_tournois->nom)
                                    <option value="{{ $jeu->id }}"> {{ $jeu->nom }} </option>
                                @endif
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
                            Créer le tournois
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection