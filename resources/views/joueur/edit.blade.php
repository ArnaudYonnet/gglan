<form class="form-horizontal" method="POST" action="/joueurs/{{ $joueur->id }}">
    {{ csrf_field() }}
    
    @if ($joueur->getRank())
        <input type="hidden" name="rank" value="{{ $joueur->getRank()->id }}">
    @endif
    <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
        <label for="pseudo" class="col-md-4 control-label">Pseudo</label>
        <div class="col-md-6">
            <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ $joueur->pseudo}}" autofocus>
            @if ($errors->has('pseudo'))
                <span class="help-block">
                    <strong>{{ $errors->first('pseudo') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
        <label for="avatar" class="col-md-4 control-label">avatar</label>
        <div class="col-md-6">
            <input id="avatar" type="text" class="form-control" name="avatar" value="{{ $joueur->avatar }}" >
            @if ($errors->has('avatar'))
                <span class="help-block">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
        <label for="ville" class="col-md-4 control-label">Ville</label>
        <div class="col-md-6">
            <input id="ville" type="text" class="form-control" name="ville" value="{{ $joueur->ville }}">
            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description" class="col-md-4 control-label">Description</label>
        <div class="col-md-6">
            <textarea name="description" id="description" class="form-control" row="10"> {{ $joueur->description }} </textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
        <label for="rank" class="col-md-4 control-label">Rank cs:go</label>
        <div class="col-md-6">

            <select id="rank" class="form-control" name="rank">
                @if ($joueur->getRank())
                    <option value="{{ $joueur->getRank()->id }}" selected disabled > {{$joueur->getRank()->nom}} </option>
                    <option value="" disabled >-- RANK --</option>
                @else
                    <option value="" selected disabled>-- RANK --</option>                
                @endif

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
            <button type="submit" class="btn btn-danger">
                Enregistrer
            </button>
        </div>
    </div>
</form>
