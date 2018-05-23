@auth
    @if (Auth::user()->hasTeamWithGame($tournament->game->id))
        @if (Auth::user()->hasTeamWithGame($tournament->game->id)->captain()->id == Auth::user()->id)


            @if ($tournament->isFull())
                <button class="btn btn-warning btn-lg" disabled>
                    {{ __('The tournament is full, thank you all !') }}
                </button>

            @else
                @if (Auth::user()->hasTeamWithGame($tournament->game->id)->players->count() != $tournament->game->players_team)
                    <button class="btn btn-warning btn-lg" disabled>
                        {{ __('Your team is not complete') }} 
                    </button>
                @else
                    @if (Auth::user()->hasTeamWithGame($tournament->game->id)->isSubscribeTournament($tournament->id))
                        <form action="/tournaments/unregister" method="POST">
                            @csrf @method('DELETE')
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                            <input type="hidden" name="team_id" value="{{ Auth::user()->hasTeamWithGame($tournament->game->id)->id }}">
        
        
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-minus"></i> {{ __('Unsubscribe your team') }}
                            </button>
                        </form>
                    @else
                        <form action="/tournaments/register" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                            <input type="hidden" name="team_id" value="{{ Auth::user()->hasTeamWithGame($tournament->game->id)->id }}">


                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-plus"></i> {{ __('Register your team') }}
                            </button>
                        </form>
                    @endif
                @endif
            @endif
        @endif
    @endif
@endauth