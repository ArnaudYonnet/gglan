<div class="modal fade" id="userCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="/admin/users" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="pseudo" class="control-label">Pseudo</label>
                            <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required>
                            @if ($errors->has('pseudo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pseudo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="birth_date" class="control-label">Birth Date</label>
                            <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>
                            @if ($errors->has('birth_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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
