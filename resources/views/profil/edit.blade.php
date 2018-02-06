<form class="form-horizontal" method="POST" action="/profil/{{Auth::user()->id_public}}/edit">
    {{ csrf_field() }}
    
    <input type="hidden" name="id_jeu" value="{{ $jeu->id }}">

    <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
        <label for="pseudo" class="col-md-4 control-label">Pseudo</label>
        <div class="col-md-6">
            <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ $profil->pseudo}}" autofocus>
            @if ($errors->has('pseudo'))
                <span class="help-block">
                    <strong>{{ $errors->first('pseudo') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
        <label for="ville" class="col-md-4 control-label">Ville</label>
        <div class="col-md-6">
            <input id="ville" type="text" class="form-control" name="ville" value="{{ $profil->ville }}" autofocus>
            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
        <label for="rank" class="col-md-4 control-label">Rank cs:go</label>
        <div class="col-md-6">
            <select id="rank" class="form-control" name="rank">
                <option selected disabled >-- RANK --</option>
                @foreach ($ranks as $rank)
                    <option value="{{ $rank->id }}"> {{ $rank->nom }} </option>
                @endforeach
            </select>
            @if ($errors->has('rank'))
                <span class="help-block">
                    <strong>{{ $errors->first('rank') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Valider
            </button>
        </div>
    </div>
</form>
