@extends('admin.layouts.template')

@section('header')
    Tournaments
@endsection

@section('description')
    Manage your tournaments
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])        
        @slot('title')        
            Tournaments
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'tournamentCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'tournaments', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>Name</th>
                <th>Game</th>
                <th>Date</th>
                <th>Team place</th>
                <th>Status</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($tournaments as $tournament)
                    <tr>
                        <td> {{ $tournament->id }} </td>
                        <td> {{ $tournament->name }} </td>
                        <td> {{ $tournament->game->name }} </td>
                        <td> 
                            {{ \Carbon\Carbon::parse($tournament->start)->format('d/m/Y') }} 
                            |
                            {{ \Carbon\Carbon::parse($tournament->finish)->format('d/m/Y') }}
                        </td>
                        <td> {{ $tournament->teams_place }} </td>
                        <td>
                            @switch($tournament->status)
                                @case("Open")
                                    <span class="label label-success">{{ $tournament->status }}</span>
                                    @break
                                @case("Close")
                                    <span class="label label-danger">{{ $tournament->status }}</span>
                                    @break
                                @default
                                    <span class="label label-warning">{{ $tournament->status }}</span>
                            @endswitch
                            @if ($tournament->isFull())
                                <span class="label label-success">Complet</span>
                            @endif
                        </td>
                        
                        <td style="text-align: center;">
                            <form action="{{ $tournament->url->delete }}" method="POST">
                                @component('admin.layouts.editButton')
                                    @slot('target')
                                    tournamentEdit{{ $tournament->id }}
                                    @endslot
                                @endcomponent

                                @csrf @method('DELETE')
                                @component('admin.layouts.deleteButton')
                                @endcomponent
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent

    @component('admin.layouts.components.box', ['col' => 'col-lg-6 col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])        
        @slot('title')        
            Registered Teams
            &nbsp
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table1', 'class' => 'table-striped'])
            @slot('headers')
                <th>Tournament</th>
                <th>Team</th>
            @endslot

            @slot('content')
                @foreach ($tournaments as $tournament)
                    @foreach ($tournament->teams as $team)
                        <tr>
                            <td> {{ $tournament->name }} </td>
                            <td> <a href="/teams/{{ $team->id }} " target="_blank"> {{ $team->name }} </a> </td>
                        </tr>
                    @endforeach
                @endforeach
            @endslot
        @endcomponent
    @endcomponent

    @component('admin.layouts.components.box', ['col' => 'col-lg-6 col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])        
        @slot('title')        
            Payed players
            &nbsp
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table2', 'class' => 'table-striped'])
            @slot('headers')
                <th> Tournament </th>
                <th> Team </th>
                <th> Player </th>
            @endslot

            @slot('content')
                @foreach ($players as $player)
                    @if (App\Tournament::find($player->tournament_id)->status == "Open")
                        <tr>
                            <td> {{ App\Tournament::find($player->tournament_id)->name }} </td>
                            <td>
                                <a href=" {{ route('teams.show', ['team' => $player->team_id]) }} " target="_blank"> {{ App\Team::find($player->team_id)->name }} </a> 
                            </td>
                            <td>
                                <a href=" {{ route('players.show', ['player' => $player->user_id]) }} " target="_blank"> {{ App\User::find($player->user_id)->pseudo }} </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
    
    {{-- Create tournament --}}
    @include('admin.tournaments.create')

    {{-- Edit tournament --}}
    @include('admin.tournaments.edit')

@endsection

@section('script')
    <script>
        $( document ).ready(function() { 
            $('#tournaments').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : false,
                'autoWidth'   : true,
                "columnDefs": [ { "orderable": false, "targets": -1 } ],
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@endsection
