<div class="modal fade" id="meetingCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="/admin/meetings" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="title" class="control-label">Title</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus required>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </h4>
                </div>

                <div class="modal-body">
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <textarea name="content" id="content" class="form-control" row="10" required></textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
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
