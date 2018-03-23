<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un rank</h4>
            </div>
            <form class="form-horizontal" method="POST" action="/admin/ranks">
                {{ csrf_field() }}
                <div class="modal-body">
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
                </div>
                    

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>