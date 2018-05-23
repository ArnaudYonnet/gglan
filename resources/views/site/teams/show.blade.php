@extends('site.layouts.template')


@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-5">
            <h2 class="text-dark"> {{ $team->name }} </h2>
            @if ($team->avatar == null)
                <img src="{{ asset('img/avatar-default.png') }}" style="width: 250px;" alt="No avatar found...">
            @else
                <img src="{{ asset(Storage::url($team->avatar)) }}" style="width: 250px;" alt="No avatar found...">
            @endif
            
            <p>{{ $team->description }}</p>

            @include('site.layouts.joinTeamButton')
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 table-responsive">
            <table class="table table-dark table-striped table-hover text-center">
                <thead>
                    <th>Pseudo</th>
                    <th>{{ __('Rank') }}</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($team->players as $player)
                        <tr class=" {{ ($team->captain()->id == $player->id) ? 'bg-danger':'' }} ">
                            <td>
                                <a href="/players/{{ $player->id }}" target="_blank" class="text-white">
                                    <b>{{ $player->pseudo }}</b>
                                </a>
                            </td>
                            <td>
                                @if ($player->getRank($team->game->id))
                                    {{ $player->getRank($team->game->id)->name }}
                                @else
                                    {{ __('No rank') }}...
                                @endif
                            </td>
                            <td>
                                @if ($player->getRank($team->game->id))
                                    <img src="{{ asset(Storage::url($player->getRank($team->game->id)->logo)) }}" alt="No avatar found...">
                                @else
                                    {{ __('No rank') }}...
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection