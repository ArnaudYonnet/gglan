@auth
    @if (Auth::user()->hasTeamWithGame($tournament->game->id))

        {{-- Tournament full --}}
        @if (Auth::user()->hasTeamWithGame($tournament->game->id)->captain()->id == Auth::user()->id)
            @if ($tournament->isFull())
                <button class="btn btn-warning btn-lg" role="button" disabled>
                    {{ __('The tournament is full, thank you all !') }}
                </button>

            @else
                {{-- Team not complete --}}
                @if (Auth::user()->hasTeamWithGame($tournament->game->id)->players->count() != $tournament->game->players_team)
                    <button class="btn btn-warning btn-lg" role="button" disabled>
                        {{ __('Your team is not complete') }} 
                    </button>
                @else
                    {{-- Unsubscribe team --}}
                    @if (Auth::user()->hasTeamWithGame($tournament->game->id)->isSubscribeTournament($tournament->id))
                        <form action="/tournaments/unregister" method="POST">
                            @csrf @method('DELETE')
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                            <input type="hidden" name="team_id" value="{{ Auth::user()->hasTeamWithGame($tournament->game->id)->id }}">
        
        
                            <button type="submit" class="btn btn-danger btn-lg" role="button">
                                <i class="fas fa-minus"></i> {{ __('Unsubscribe your team') }}
                            </button>
                        </form>
                    @else
                        {{-- Register team --}}
                        <form action="/tournaments/register" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                            <input type="hidden" name="team_id" value="{{ Auth::user()->hasTeamWithGame($tournament->game->id)->id }}">


                            <button type="submit" class="btn btn-success btn-lg" role="button">
                                <i class="fas fa-plus"></i> {{ __('Register your team') }}
                            </button>
                        </form>
                    @endif
                @endif
            @endif
        @endif
    @endif
@endauth