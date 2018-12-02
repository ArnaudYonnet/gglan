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
                        @include('site.tournaments.registerButton')
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection