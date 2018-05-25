@foreach ($partners as $key => $partner)
    <div class="modal fade" id="partnerEdit{{ $partner->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ $partner->url->update }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $partner->name }}" autofocus required>
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
                                <input id="site" type="url" class="form-control" name="site" value="{{ $partner->site }}" required>
                                @if ($errors->has('site'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="email" class="control-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $partner->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <img src="{{ asset(Storage::url($partner->logo)) }}" alt="No logo..." style="max-width: 150px">
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
