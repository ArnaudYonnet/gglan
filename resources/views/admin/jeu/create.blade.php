<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un jeu</h4>
            </div>
            <form class="form-horizontal" method="POST" action="/admin/jeux">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                        <label for="nom" class="col-md-4 control-label">Nom</label>
                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" autofocus required>                
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
                            <textarea name="description" id="description" class="form-control" row="10" spellcheck="true" required>{{ old('description') }}</textarea>            
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
                            <input id="nb_jeu" type="number" class="form-control" name="nb_jeu" value="{{ old('nb_jeu') }}" required>                
                            @if ($errors->has('nb_jeu'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nb_jeu') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>