@extends('admin.layouts.template')

@section('header')
    {{ __('Games') }}
@endsection

@section('description')
    {{ __('Manage your games') }}
@endsection

@section('content')

   @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            {{ __('Games') }}
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'gameCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>{{ __('Name') }}</th>
                <th>Description</th>
                <th>{{ __('Players') }} / {{ __('Team') }}</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($games as $game)
                    <tr>
                        <td> {{ $game->name }} </td>
                        <td> {{ $game->description }} </td>
                        <td> {{ $game->players_team }} </td>
                        
                        <td style="text-align: center;">
                            <form action="{{ $game->url->delete }}" method="POST">
                                @component('admin.layouts.editButton')
                                    @slot('target')
                                        gameEdit{{ $game->id }}
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
    
    {{-- Create game --}}
    @include('admin.games.create')

    {{-- Edit game --}}
    @include('admin.games.edit')
@endsection