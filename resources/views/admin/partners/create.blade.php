<div class="modal fade" id="partnerCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action=" {{ route('admin.partners.store') }} " method="POST" enctype="multipart/form-data">
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
                    <div class="form-group{{ $errors->has('site') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="site" class="control-label">Site url</label>
                            <input id="site" type="url" class="form-control" name="site" value="{{ old('site') }}" placeholder="https:// ...">
                            @if ($errors->has('site'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('site') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <label for="email" class="control-label">Contact</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="john.doe@example.com" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

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
