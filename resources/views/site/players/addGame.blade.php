<div class="modal fade" id="addGame" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGame"> {{ __('Add game') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="/players/{{ $player->id }}/game" method="POST">
                <div class="modal-body">
                    @csrf

                    <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="game_id" class="control-label">{{ __('Game') }}</label>
                            <select name="game_id" id="game_id" class="form-control" required>
                                <option selected disabled> -- {{ __('Choose a game') }} -- </option>
                                @foreach (App\Game::all() as $game)
                                    @if ($player->games->count() != 0)
                                        @foreach ($player->games as $pgame)
                                            @if ($pgame->id == $game->id)
                                                <option disabled> {{ $game->name }} </option>
                                            @else
                                                <option value=" {{ $game->id }} "> {{ $game->name }} </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value=" {{ $game->id }} "> {{ $game->name }} </option>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Ajouter') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>