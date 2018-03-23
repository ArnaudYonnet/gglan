<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Créer un tournois</h4>
            </div>
            <form class="form-horizontal" method="POST" action="/admin/tournois">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('nom_tournois') ? ' has-error' : '' }}">
                        <label for="nom_tournois" class="col-md-4 control-label">Nom</label>
                        <div class="col-md-6">
                            <input id="nom_tournois" type="text" class="form-control" name="nom_tournois" value="{{ old('nom_tournois') }}" autofocus required>                
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
                            <input id="date_deb" type="date" class="form-control" name="date_deb" value="{{ old('date_deb') }}" >                
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
                            <input id="date_fin" type="date" class="form-control pull-right" name="date_fin" value="{{ old('date_fin') }}" >                
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
                            <textarea name="description" id="description" class="form-control" row="10" spellcheck="true" required>{{ old('description') }}</textarea>            
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('place_equipe') ? ' has-error' : '' }}">
                        <label for="place_equipe" class="col-md-4 control-label">Place équipe</label>
                        <div class="col-md-6">
                            <input id="place_equipe" type="number" min="0" class="form-control" name="place_equipe" value="{{ old('place_equipe') }}" required>           
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
                            <select id="id_jeu" class="form-control" name="id_jeu" required>
                                <option selected disabled >-- JEU --</option>
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
                            <select id="status" class="form-control" name="status" required>
                                <option value="ouvert" selected>Ouvert</option>
                                <option value="ferme">Fermé</option>
                            </select> @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>