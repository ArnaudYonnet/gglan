@foreach ($admins as $admin)
    <div class="modal fade" id="admin{{ $admin->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $admin->name }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>{{ __('Name') }}:</b> {{ $admin->name }} </p>
                    {{-- <p><b>Role:</b> {{ $admin->role->name }}</p> --}}
                    <p><b>{{ __('Email') }}:</b> {{ $admin->email }}</p>
                    <p><b>Admin {{ __('since') }}: </b> {{ \Carbon\Carbon::parse($admin->created_at)->format('m/Y') }} </p>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

