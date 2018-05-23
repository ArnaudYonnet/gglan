@foreach ($teams as $team)
    <div class="modal fade" id="team{{ $team->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ $team->name }} </h4>
                </div>
    
                <div class="modal-body">
                    <p><b>Name:</b> {{ $team->name }} </p>
                    <p><b>Created at: </b> {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y') }} </p>
                    <p><b>Captain:</b> <a href="/players/{{ $team->user_id }}" target="_blank">{{ App\User::find($team->user_id)->pseudo }}</a> </p>
                    <p><b>Description:</b> {!! $team->description !!} </p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Player</th>
                            <th>Rank</th>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $player)
                            <tr>
                                <td> {{ $player->pseudo }} </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p><b>Avatar:</b></p>
                    <img src="{{ asset(Storage::url($team->avatar)) }}" alt="No avatar..." style="max-width: 250px">
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
@endforeach

