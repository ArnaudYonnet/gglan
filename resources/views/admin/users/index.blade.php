@extends('admin.layouts.template')

@section('header')
    Players
@endsection

@section('description')
    Manage your players
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Players
            &nbsp
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#userCreate">
                <i class="fas fa-plus"></i> Create
            </button>
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>Pseudo</th>
                <th>Description</th>
                <th>Team(s)</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> <a href="/players/{{ $user->id }}" target="_blank">{{ $user->pseudo }}</a> </td>
                    <td> {{ str_limit($user->description, 20, ' [...]') }} </td>
                    @switch($user->teams->count())
                        @case(null)
                            <td>No Team...</td>
                            @break
                        @case(1)
                            <td><a href="/teams/{{ $user->teams[0]->id }}" target="_blank">{{ $user->teams[0]->name }}</a></td>
                            @break
                        @default
                            <td>
                                @foreach ($user->teams as $team)
                                    <a href="/teams/{{ $team->id }}" target="_blank">{{ $team->name }}</a>
                                    @if (!$loop->last)
                                        |
                                    @endif
                                @endforeach
                            </td>
                    @endswitch
                    <td style="text-align: center;">
                        <form action="{{ $user->url->delete }}" method="POST">

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#user{{ $user->id }}">
                                <i class="fa fa-eye"></i> Read
                            </button>
                            &nbsp
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userEdit{{ $user->id }}">
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
    
    {{-- Create player --}}
    @include('admin.users.create')

    {{-- Show players --}}
    @include('admin.users.show')

    {{-- Create player --}}
    @include('admin.users.edit')

@endsection