{{-- Si le joueur est connecté et que son équipe est inscrite --}}
@auth
    @if (Auth::user()->hasTeamWithGame($tournament->game->id))
        @if (Auth::user()->hasTeamWithGame($tournament->game->id)->isSubscribeTournament($tournament->id))
            @if (Auth::user()->tournamentPlace->payed)
                <button class="btn btn-success btn-lg" id="checkout-button" role="button" title="Vous pouvez quand même payer votre entrée sur place avant la Lan" disabled>
                    <i class="fas fa-shopping-cart"></i>
                    Acheter ma place !
                </button>
            @else
                <button class="btn btn-success btn-lg" id="checkout-button" role="button" title="Vous pouvez quand même payer votre entrée sur place avant la Lan" >
                    <i class="fas fa-shopping-cart"></i>
                    Acheter ma place !
                </button>
            @endif
        @endif
    @endif
@endauth