<div class="modal fade" id="gameCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="/admin/games" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="name" class="control-label">{{ __('Name') }}</label>
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
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="description" class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" row="10" required></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('players_team') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="players_team" class="control-label">{{ __('Players per team') }}</label>
                            <input type="number" name="players_team" id="players_team" class="form-control" min="1" required>
                            @if ($errors->has('players_team'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('players_team') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-success" type="submit">{{ __('Create') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
