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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#gameCreate">
                <i class="fas fa-plus"></i> {{ __('Create') }}
            </button>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gameEdit{{ $game->id }}">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </button>
                                &nbsp
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                </button>

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