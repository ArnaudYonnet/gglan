@foreach ($tournaments as $tournament)
    <div class="modal fade" id="tournamentEdit{{ $tournament->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ $tournament->url->update }}" method="POST">

                    <input type="hidden" name="game_id" value=" {{ $tournament->game_id }} ">
                    <input type="hidden" name="status" value=" {{ $tournament->status }} ">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $tournament->name }}" required>
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
                        <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="name" class="control-label">Game</label>
                                <select name="game_id" id="game_id" class="form-control">
                                    <option value="{{ $tournament->game_id }}" selected disabled>{{ $tournament->game->name }}</option>
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

                        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="start" class="control-label">Start date</label>
                                <input id="start" type="date" class="form-control" name="start" value="{{ $tournament->start }}" required>
                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('finish') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="finish" class="control-label">Finish date</label>
                                <input id="finish" type="date" class="form-control" name="finish" value="{{ $tournament->finish }}" required>
                                @if ($errors->has('finish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finish') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" row="10" required> {{ $tournament->description }} </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('teams_place') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="teams_place" class="control-label">Teams place</label>
                                <input id="teams_place" type="number" class="form-control" name="teams_place" value="{{ $tournament->teams_place }}" min="1" required>
                                @if ($errors->has('teams_place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teams_place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cashprize') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="cashprize" class="control-label">Cashprize</label>
                                <input id="cashprize" type="number" class="form-control" name="cashprize" value="{{ $tournament->cashprize }}" min="1" placeholder="XXX €" required>
                                @if ($errors->has('cashprize'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cashprize') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="name" class="control-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    @switch($tournament->status)
                                        @case("Open")
                                            <option value="{{ $tournament->status }}" selected>{{ $tournament->status }}</option>
                                            <option value="Close">Close</option>
                                            <option value="Finish">Finish</option>
                                            @break
                                        @case("Close")
                                            <option value="{{ $tournament->status }}" selected>{{ $tournament->status }}</option>
                                            <option value="Open">Open</option>
                                            <option value="Finish">Finish</option>
                                            @break
                                        @default
                                            <option value="{{ $tournament->status }}" selected>{{ $tournament->status }}</option>
                                            <option value="Open">Open</option>
                                            <option value="Close">Close</option>
                                    @endswitch
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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