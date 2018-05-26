@extends('admin.layouts.template')

@section('header')
    Ranks
@endsection

@section('description')
    Manage the ranks of your games
@endsection

@section('content')

   @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Ranks
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'rankCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>Game</th>
                <th>Name</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($ranks as $rank)
                    <tr>
                        <td> {{ $rank->id }} </td>
                        <td> {{ $rank->game->name }} </td>
                        <td> {{ $rank->name }} </td>
                        
                        <td style="text-align: center;">
                            <form action="{{ $rank->url->delete }}" method="POST">
                                @component('admin.layouts.editButton')
                                    @slot('target')
                                    rankEdit{{ $rank->id }}
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
    
    {{-- Create rank --}}
    @include('admin.ranks.create')

    {{-- Edit rank --}}
    @include('admin.ranks.edit')
@endsection