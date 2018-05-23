@foreach ($partners as $partner)
    <div class="modal fade" id="partner{{ $partner->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $partner->name }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>Site:</b> <a href="{{ $partner->site }}">{{ $partner->site }}</a> </p>
                    <p><b>Partner since:</b> {{ \Carbon\Carbon::parse($partner->created_at)->format('m/Y') }} </p>
                    <p><b>Contact:</b> {!! $partner->email !!}</p>
                    <p><b>Logo:</b></p>
                    <img src="{{ asset(Storage::url($partner->logo)) }}" alt="No logo..." style="max-width: 250px">
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

