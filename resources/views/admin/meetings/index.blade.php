@extends('admin.layouts.template')

@section('header')
    Meetings
@endsection

@section('description')
    Manage your meetings reports
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Meetings
            &nbsp
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#meetingCreate">
                <i class="fas fa-plus"></i> Create
            </button>
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>#</th>
                <th>Author</th>
                <th>Title</th>
                <th>Date</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($meetings as $key => $meeting)
                <tr>
                    <td> {{ $key+1 }} </td>
                    <td> {{ $meeting->admin->name }} </td>
                    <td> {{ $meeting->title }} </td>
                    <td> {{ \Carbon\Carbon::parse($meeting->created_at)->format('d/m/Y') }} </td>
                    <td style="text-align: center;">
                        <form action="{{ $meeting->url->delete }}" method="POST">

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#meeting{{ $meeting->id }}">
                                <i class="fa fa-eye"></i> Read
                            </button>
                            &nbsp
                            <a href=" {{ $meeting->url->edit }} " class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
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
    
    {{-- Create meeting --}}
    @include('admin.meetings.create')

    {{-- Show meetings --}}
    @include('admin.meetings.show')

@endsection