<form class="form-horizontal" method="POST" action="/equipes/{{ $equipe->id }}/add">
        {{ csrf_field() }}
        <input type="hidden" name="id_equipe" value="{{ $equipe->id }}" />

        <div class="form-group{{ $errors->has('id_public') ? ' has-error' : '' }}">
            <label for="id_user" class="col-md-4 control-label">ID du joueur</label>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <input id="id_public" type="text" class="form-control" name="id_public" value="{{ old('id_public') }}" placeholder="Ex: hTp59" maxlength="5" autofocus>
                @if ($errors->has('id_public'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_public') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                    Ajouter à mon équipe
                </button>
            </div>
        </div>
</form>