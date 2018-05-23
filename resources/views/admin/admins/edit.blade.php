@foreach ($admins as $admin)
    <div class="modal fade" id="adminEdit{{ $admin->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ $admin->url->update }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="role_id" value="{{ $admin->role->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <label for="name" class="control-label">{{ __('name') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $admin->name }}">
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
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="email" class="control-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $admin->email }}" >
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <label for="role_id" class="control-label">{{ __('Role') }}</label>
                                <select id="role_id" name="role_id" class="form-control" value="{{ old('role') }}" required>
                                    <option value="" selected disabled> {{ $admin->role->name }} </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ __('Close') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('Update') }}</button>
                    </div>
                </form>

            </div>
    </div>
    </div>
@endforeach
