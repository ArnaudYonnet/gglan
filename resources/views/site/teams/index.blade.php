@extends('site.layouts.template')


@section('content')
    @component('site.layouts.components.search', ['search' => 'teams']) 
    @endcomponent

    <div class="row">
        <div class="col-lg-12 mx-auto mt-4">
            {{ $teams->links() }}
        </div>
    </div>

    <div class="row">
        @foreach ($teams as $team)
            <div class="col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                <div class="card">
                    <h5 class="card-header">
                        <a href="/teams/{{ $team->id }}" class="text-danger">{{ $team->name }}</a>
                        @if ($team->players->count() == $team->game->players_team)
                            <span class="badge badge-success"> {{ __('Full') }} </span>
                        @else
                            <span class="d-inline-block">{{ $team->players->count() }} / {{ $team->game->players_team }}</span>
                        @endif
                    </h5>
                    <div class="card-body">
                        <a href="/teams/{{ $team->id }}">
                            @if ($team->avatar == null)
                                <img class="card-img-top" src="{{ asset('img/avatar-default.png') }}">
                            @else
                                <img class="card-img-top" src="{{ asset(Storage::url($team->avatar)) }}">
                            @endif
                        </a>
                        <p class="card-text"> Game: <b>{{ $team->game->name }}</b> </p>
                        <p class="card-text"> {{ str_limit($team->description, 30, ' [...]') }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto mt-4">
            {{ $teams->links() }}
        </div>
    </div>
@endsection