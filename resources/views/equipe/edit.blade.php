<form class="form-horizontal mt-4 mb-4" method="POST" action="/equipes/{{ $equipe->id }}">
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
        <div class="col-md-6">
            <input id="avatar_equipe" type="url" class="form-control" name="avatar_equipe" value="{{ $equipe->avatar_equipe }}" placeholder="Ex: https://imgur.com" required>
            @if ($errors->has('avatar_equipe'))
                <span class="help-block">
                    <strong>{{ $errors->first('avatar_equipe') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-danger">
                Enregistrer
            </button>
        </div>
    </div>
</form>
