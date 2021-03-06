<div class="modal fade" id="roleCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="/admin/roles" method="POST">
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

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="player" class="control-label">{{ __('Players') }}</label>
                            <input id="player" type="checkbox" class="checkbox-minimal" name="players">
                    
                            <br />

                            <label for="tournaments" class="control-label">{{ __('Tournaments') }}</label>
                            <input id="tournaments" type="checkbox" class="checkbox-minimal" name="tournaments">
                            
                            <br />
                    
                            <label for="meeting" class="control-label">{{ __('Meetings') }}</label>
                            <input id="meeting" type="checkbox" class="checkbox-minimal" name="meetings">
                    
                            <br />
                    
                            <label for="post" class="control-label">{{ __('Posts') }}</label>
                            <input id="post" type="checkbox" class="checkbox-minimal" name="posts">
                    
                            <br />
                    
                            <label for="role" class="control-label">{{ __('Partners') }}</label>
                            <input id="role" type="checkbox" class="checkbox-minimal" name="partners">
                    
                            <br />
                    
                            <label for="admin" class="control-label">{{ __('Admins') }}</label>
                            <input id="admin" type="checkbox" class="checkbox-minimal" name="admins">
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
