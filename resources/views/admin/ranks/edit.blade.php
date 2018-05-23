@foreach ($ranks as $key => $rank)
    <div class="modal fade" id="rankEdit{{ $rank->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ $rank->url->update }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type="hidden" name="game_id" value=" {{ $rank->game->id }} ">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $rank->name }}" autofocus required>
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
                        <img src="{{ asset(Storage::url($rank->logo)) }}" alt="No logo..." style="max-width: 150px">
                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="logo" class="control-label">Logo</label>
                                <input id="logo" type="file" name="logo" value="{{ old('logo') }}">
                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
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
