@foreach ($teams as $team)
    <div class="modal fade" id="teamEdit{{ $team->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ $team->url->update }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type="hidden" name="game_id" value="{{ $team->game->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $team->name }}" autofocus required>
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
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10" required> {!! $team->description !!} </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="name" class="control-label">Game</label>
                                <select name="game_id" id="game_id" class="form-control">
                                    <option value="" selected disabled> {{ $team->game->name }} </option>
                                    @foreach (App\Game::all() as $game)
                                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                                    @endforeach
                                </select> @if ($errors->has('game_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('game_id') }}</strong>
                                </span> @endif
                            </div>
                        </div>


                        <img src=" {{ asset(Storage::url($team->avatar)) }} " alt="No avatar..." style="max-width: 150px">
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
@endforeach
