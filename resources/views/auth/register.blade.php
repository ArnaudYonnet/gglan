@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <h5>* <u>Champ obligatoire uniquement pour les joueurs</u></h5>
                        
                        <input type="hidden" name="id_public" value="{{ str_random(5) }}">

                        <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                            <label for="pseudo" class="col-md-4 control-label">Pseudo *</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" autofocus>

                                @if ($errors->has('pseudo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <label for="nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required >

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
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required >

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar *</label>

                            <div class="col-md-6">
                                <input id="avatar" type="text" class="form-control" name="avatar" value="{{ old('avatar') }}" placeholder="Ex: https://imgur.com" >

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <select name="type" id="type" class="custom-select" required>
                                    <option disabled selected>-- Type d'inscription --</option>
                                    <option value="Joueur">Joueur</option>
                                    <option value="Visiteur">Visiteur</option>
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control" row="10">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_naissance') ? ' has-error' : '' }}">
                            <label for="date_naissance" class="col-md-4 control-label">Date de naissance</label>

                            <div class="col-md-6">
                                <input id="date_naissance" type="date" class="form-control" name="date_naissance" value="{{ old('date_naissance') }}" required >

                                @if ($errors->has('date_naissance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_naissance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Créer un compte
                                </button>
                            </div>
                        </div>
                    </form>
                    <h5>Le prix de l'inscription est de 10€, repas non fournis, payable en espèce sur le site de la lan <u>uniquement</u></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
