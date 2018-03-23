




<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier mes informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="/equipes/{{ $equipe->id }}">
                <div class="modal-body">
                    {{ csrf_field() }} 

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control" row="10" required> {{ $equipe->description }} </textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('avatar_equipe') ? ' has-error' : '' }}">
                        <label for="avatar_equipe" class="col-md-4 control-label">Avatar</label>
                        <div class="col-md-10">
                            <input id="avatar_equipe" type="url" class="form-control" name="avatar_equipe" value="{{ $equipe->avatar_equipe }}" placeholder="Ex: https://imgur.com" required>
                            @if ($errors->has('avatar_equipe'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar_equipe') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>