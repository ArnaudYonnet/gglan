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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rankCreate">
                <i class="fas fa-plus"></i> Create
            </button>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rankEdit{{ $rank->id }}">
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
    
    {{-- Create rank --}}
    @include('admin.ranks.create')

    {{-- Edit rank --}}
    @include('admin.ranks.edit')
@endsection