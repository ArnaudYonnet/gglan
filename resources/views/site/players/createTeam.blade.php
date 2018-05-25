<div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTeam"> {{ __('Create team') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="/teams" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="name" class="control-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="game_id" class="control-label">{{ __('Game') }}</label>
                            <select name="game_id" id="game_id" class="form-control" required>
                                <option selected disabled> -- {{ __('Choose a game') }} -- </option>
                                @foreach (App\Game::all() as $game)
                                    @if ($player->teams->count() != 0)
                                        @if (!$player->hasTeamWithGame($game->id))
                                            <option value=" {{ $game->id }} "> {{ $game->name }} </option>
                                        @else
                                            <option disabled> {{ $game->name }} </option>
                                        @endif
                                    @else
                                        <option value=" {{ $game->id }} "> {{ $game->name }} </option> 1
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('game_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('game_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="avatar" class="control-label">Avatar</label>
                            <input id="avatar" type="file" name="avatar" value="{{ old('avatar') }}" required>
                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>