@extends('admin.layouts.template')

@section('header')
    Teams
@endsection

@section('description')
    Manage your teams
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Teams
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'teamCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>Name</th>
                <th>Players</th>
                <th>Description</th>
                <th>Game</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($teams as $team)
                <tr>
                    <td> {{ $team->id }} </td>
                    <td> <a href="/teams/{{ $team->id }}" target="_blank">{{ $team->name }}</a> </td>
                    <td> {{ $team->players->count() }} / {{ $team->game->players_team }} </td>
                    <td> {{ str_limit($team->description, 20, ' [...]') }} </td>
                    <td> {{ $team->game->name }} </td>
                    <td style="text-align: center;">
                        <form action="{{ $team->url->delete }}" method="POST">

                            @component('admin.layouts.readButton')
                                @slot('target')
                                   team{{ $team->id }}
                                @endslot
                            @endcomponent

                            @component('admin.layouts.editButton')
                                @slot('target')
                                   teamEdit{{ $team->id }}
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
    
    {{-- Create team --}}
    @include('admin.teams.create')

    {{-- Show team --}}
    @include('admin.teams.show')

    {{-- Create team --}}
    @include('admin.teams.edit')
@endsection