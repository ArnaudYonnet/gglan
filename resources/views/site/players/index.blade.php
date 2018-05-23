@extends('site.layouts.template')


@section('content')
    @component('site.layouts.components.search', ['search' => 'players'])
    @endcomponent

    <div class="row">
        <div class="col-lg-12 mx-auto mt-4">
            {{ $players->links() }}
        </div>
    </div>

    <div class="row">
        @foreach ($players as $player)
            <div class="col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                <div class="card">
                    <h5 class="card-header">
                        <a href="/players/{{ $player->id }}">{{ $player->pseudo }}</a>
                    </h5>
                    <div class="card-body">
                        <a href="/players/{{ $player->id }}">
                            @if ($player->avatar == null)
                                <img class="card-img-top" src="{{ asset('img/avatar-default.png') }}">
                            @else
                                <img class="card-img-top" src="{{ asset(Storage::url($player->avatar)) }}">
                            @endif
                        </a>
            
                        <p class="card-text"> {{ str_limit($player->description, 30, '[...]') }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto mt-4">
            {{ $players->links() }}
        </div>
    </div>
@endsection