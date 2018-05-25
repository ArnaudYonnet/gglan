@foreach ($users as $user)
    <div class="modal fade" id="user{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $user->pseudo }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>Name:</b> {{ $user->name }} </p>
                    <p><b>Pseudo:</b> {{ $user->pseudo }} </p>
                    <p><b>Birth date: </b> {{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }} </p>
                    <p><b>Email:</b> {!! $user->email !!}</p>
                    <p><b>Avatar:</b></p>
                    <img src=" {{ asset(Storage::url($user->avatar)) }} " alt="No avatar..." style="max-width: 250px">
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

