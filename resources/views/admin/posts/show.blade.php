@foreach ($posts as $post)
    <div class="modal fade" id="post{{ $post->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $post->title }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>Author:</b> <a href="#">{{ $post->admin->name }}</a> </p>
                    <p><b>Last update:</b> {{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }} </p>
                    <p><b>Post:</b> {!! $post->content !!}</p>
                    <p><b>Logo:</b></p>
                    <img src="{{ asset(Storage::url($post->logo)) }}" alt="No logo..." style="max-width: 250px">
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

