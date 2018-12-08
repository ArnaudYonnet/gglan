@extends('site.layouts.template')

@section('content')
    <div class="row">
        @foreach ($tournaments as $tournament)
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="display-4"> 
                        {{ $tournament->name }}
                        <span class="badge badge-danger">
                            {{ $tournament->teams->count() }} / {{ $tournament->teams_place }}
                        </span> 
                    </h1>
                    <p class="lead">{{ $tournament->description }}</p>
    
                    <hr class="my-4">
    
                    <p>Date: 
                        <b>{{ \Carbon\Carbon::parse($tournament->start)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tournament->finish)->format('d/m/Y') }}</b> 
                    </p>
    
                    <p> {{ __('Game') }} : 
                        <b>{{ $tournament->game->name }}</b> 
                    </p>
    
                    <p> {{ __('Registered teams') }} :
                        <ul class="list-unstyled list-inline">
                            <?php $i = 0; ?>
                            @foreach ($tournament->teams as $team)
                                @if ($i++ >= 4)
                                    <br />
                                    <?php $i = 0; ?>
                                @endif
                                <li class="list-inline-item">
                                    <a href="/teams/{{ $team->id }}" class="text-danger">{{ $team->name }}</a>
                                </li>
    
                                @if (!$loop->last)
                                    |
                                @endif
                            @endforeach
                        </ul>
                    </p>
                    
                    <p class="lead">
                        <div class="btn-group" role="group">
                            @include('site.tournaments.registerButton')
                            @include('site.tournaments.buyButton')
                        </div>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script src="https://js.stripe.com/v3"></script>

    <script>
        var stripe = Stripe('{{ config("app.stripeKey") }}', {
                betas: ['checkout_beta_3']
            });
    
            var checkoutButton = document.getElementById('checkout-button');
            checkoutButton.addEventListener('click', function () {
                // When the customer clicks on the button, redirect
                // them to Checkout.
                stripe.redirectToCheckout({
                    items: [{ sku: 'sku_E55Ehj3dsZwcI5', quantity: 1 }],
    
                    // Note that it is not guaranteed your customers will be redirected to this
                    // URL *100%* of the time, it's possible that they could e.g. close the
                    // tab between form submission and the redirect.
                    successUrl: '{{ route("tournaments.buy.success") }}' ,
                    cancelUrl: '{{ route("tournaments.buy.fail") }}',
                })
                    .then(function (result) {
                        if (result.error) {
                            // If `redirectToCheckout` fails due to a browser or network
                            // error, display the localized error message to your customer.
                            var displayError = document.getElementById('error-message');
                            displayError.textContent = result.error.message;
                        }
                    });
            });
    </script>
@endsection