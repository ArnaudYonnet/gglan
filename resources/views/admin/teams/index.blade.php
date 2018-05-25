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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#teamCreate">
                <i class="fas fa-plus"></i> Create
            </button>
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

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#team{{ $team->id }}">
                                <i class="fa fa-eye"></i> Read
                            </button>
                            &nbsp
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamEdit{{ $team->id }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            &nbsp
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
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