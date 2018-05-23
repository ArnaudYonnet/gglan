@foreach ($player->games as $game)
    <div class="modal fade" id="addRank{{ $game->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRank"> {{ __('Add rank') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/players/{{ $player->id }}/rank" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="game_id" value=" {{ $game->id }} ">
                        <div class="form-group{{ $errors->has('rank_id') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="rank_id" class="control-label">{{ __('Rank') }}</label>
                                <select name="rank_id" id="rank_id" class="form-control" required>
                                    <option selected disabled> -- {{ __('Choose a rank') }} -- </option>
                                    @foreach ($game->ranks as $rank)
                                        <option value="{{ $rank->id }}"> {{ $rank->name }} </option>
                                    @endforeach
                                </select> @if ($errors->has('rank_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('rank_id') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach