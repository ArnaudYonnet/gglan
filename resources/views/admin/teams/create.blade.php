<div class="modal fade" id="teamCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="/admin/teams" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="name" class="control-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </h4>
                </div>

                <div class="modal-body">
                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="user_id" class="control-label">Captain</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="" selected disabled>-- Choose a captain --</option>
                                @foreach (App\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->pseudo }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="name" class="control-label">Game</label>
                            <select name="game_id" id="game_id" class="form-control" required>
                                <option value="" selected disabled>-- Choose a game --</option>
                                @foreach (App\Game::all() as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
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
                            <input id="avatar" type="file" name="avatar" value="{{ old('avatar') }}">
                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
