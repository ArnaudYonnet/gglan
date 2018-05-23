@extends('site.layouts.template')


@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <h2 class="text-dark"> {{ $player->pseudo }} </h2>
            @if ($player->avatar == null)
                <img src="{{ asset('img/avatar-default.png') }}" style="width: 250px;" alt="No avatar foud...">
            @else
                <img src="{{ asset(Storage::url($player->avatar)) }}" style="width: 250px;" alt="No avatar foud...">
            @endif
        </div>
        <div class="col-lg-8 col-md-8">
            @if ($player->discord)
                <p>
                    <i class="fab fa-discord"></i>
                    <b> Discord </b> : 
                    {{ $player->discord }}
                </p>
            @endif

            @if ($player->twitter)
                <p>
                    <i class="text-primary fab fa-twitter"></i>
                    <a href="https://twitter.com/{{ str_after($player->twitter, '@') }} ">
                        {{ $player->twitter }}
                    </a>
                </p>
            @endif

            @if ($player->steam)
                <p>
                    <a href=" {{ $player->steam }} " class="btn btn-secondary" target="_blank">
                        <i class="fab fa-steam"></i>
                        Steam
                    </a>
                </p>
            @endif
            
            <p> <b>Description:</b></p>
            <p> {{ $player->description }} </p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-8 table-responsive">

            <h3> {{ __('Games') }}: </h3>
            <table class="table table-dark table-striped table-hover text-center">
                <thead>
                    <th> {{ __('Game') }} </th>
                    <th> {{ __('Rank') }} </th>
                    <th></th>
                </thead>
                <tbody>
                    @if ($player->games->count() == 0)
                        <tr>
                            <td colspan=" {{ (Auth::check() && Auth::user()->id == $player->id) ? 4 : 3 }} "> {{ __('No game') }}...</td>
                        </tr>
                    @else
                        @foreach ($player->games as $game)
                            <tr>
                                <td> {{ $game->name }} </td>
                                <td>
                                    @if ($player->getRank($game->id))
                                        {{ $player->getRank($game->id)->name }}
                                    @else
                                        {{ __('No rank') }}...
                                    @endif
                                </td>
                                <td>
                                    @if ($player->getRank($game->id))
                                        <img src="{{ asset(Storage::url($player->getRank($game->id)->logo)) }}" alt="No image found...">
                                    @else
                                        {{ __('No rank') }}...
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <hr>
        
    <div class="row">
        <div class="col-lg-8 table-responsive">

            <h3> {{ __('Teams') }}: </h3>
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <th> {{ __('Team') }} </th>
                    <th> {{ __('Game') }} </th>
                </thead>
                <tbody>
                    @if ($player->teams->count() == 0)
                        <tr>
                            <td class="text-center" colspan="3">{{ __('No team') }}...</td>
                        </tr>
                    @else
                        @foreach ($player->teams as $team)
                            <tr>
                                <td>
                                    <a href="/teams/{{ $team->id }}"> {{ $team->name }} </a>
                                </td>
                                <td>{{ $team->game->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection