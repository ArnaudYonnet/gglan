@auth
    @if ($team->players->count() != $team->game->players_team)
        <form action="/teams/joinrequest" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="team_id" value="{{ $team->id }}">
            
            {{-- If the player has no team --}}
            @if (Auth::user()->teams->count() == 0 && !Auth::user()->joinrequests->where('team_id', $team->id)->first())
                <button class="btn btn-success" type="submit">
                    {{ __('Ask to join the team') }}
                </button>
            @else
                @if (!Auth::user()->teams->where('id', $team->id)->first())

                    @if (!Auth::user()->hasTeamWithGame($team->game->id))

                        @if (!Auth::user()->joinrequests->where('team_id', $team->id)->first())
                            <button class="btn btn-success" type="submit">
                                {{ __('Ask to join the team') }}
                            </button>
                            
                        @else
                            @if (Auth::user()->joinrequests->where('team_id', $team->id)->first()->status == 'refused')
                                <button class="btn btn-danger" disabled>
                                    {{ __('Your demand has been refused') }}
                                </button>
                            @else
                                <button class="btn btn-success" disabled>
                                    {{ __('You already ask to enter in this team') }}
                                </button>
                            @endif
                        @endif
                    @endif
                @endif
            @endif
        </form>
    @endif
@endauth