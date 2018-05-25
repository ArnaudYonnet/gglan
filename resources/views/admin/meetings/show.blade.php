@foreach ($meetings as $meeting)
    <div class="modal fade" id="meeting{{ $meeting->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $meeting->title }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>Author:</b> <a href="#">{{ $meeting->admin->name }}</a> </p>
                    <p><b>Last update:</b> {{ \Carbon\Carbon::parse($meeting->updated_at)->format('d/m/Y') }} </p>
                    <p><b>Meeting:</b> {!! $meeting->content !!}</p>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

