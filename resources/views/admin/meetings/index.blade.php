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
            @component('admin.layouts.createButton', ['target' => 'meetingCreate'])
            @endcomponent
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

                            @component('admin.layouts.readButton')
                                @slot('target')
                                    meeting{{ $meeting->id }}
                                @endslot
                            @endcomponent

                            @component('admin.layouts.editButton')
                                @slot('target')
                                    meetingEdit{{ $meeting->id }}
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
    
    {{-- Create meeting --}}
    @include('admin.meetings.create')

    {{-- Show meetings --}}
    @include('admin.meetings.show')

@endsection