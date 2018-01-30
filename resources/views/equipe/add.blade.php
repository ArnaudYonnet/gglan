<form class="form-horizontal" method="POST" action="/equipes/{{ $equipe->id }}/add">
        {{ csrf_field() }}

       {{--   @for ($i = count($joueurs); $i < 5; $i++)
            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="col-md-4 control-label">Nom</label>
                <div class="col-md-6">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" autofocus>
                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        @endfor  --}}
        <input type="hidden" name="id_equipe" value="{{ $equipe->id }}" />
        <div class="form-group{{ $errors->has('id_user') ? ' has-error' : '' }}">
            <label for="id_user" class="col-md-4 control-label">ID du joueur</label>
            <div class="col-md-6">
                <input id="id_user" type="text" class="form-control" name="id_user" value="{{ old('id_user') }}" autofocus>
                @if ($errors->has('id_user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_user') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Ajouter mon équipier
                </button>
            </div>
        </div>
</form>