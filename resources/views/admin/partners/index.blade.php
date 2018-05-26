@extends('admin.layouts.template')

@section('header')
    Partners
@endsection

@section('description')
    Manage your partners
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Partners
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'partnerCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>Name</th>
                <th>Site</th>
                <th>Since</th>
                <th>Contact</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($partners as $partner)
                <tr>
                    <td> {{ $partner->name }} </td>
                    <td> <a href="{{ $partner->site }}" target="_blank">{{ $partner->name }}</a> </td>
                    <td> {{ \Carbon\Carbon::parse($partner->created_at)->format('m/Y') }} </td>
                    <td> {{ $partner->email }} </td>
                    <td style="text-align: center;">
                        <form action="{{ $partner->url->delete }}" method="POST">

                            @component('admin.layouts.readButton')
                                @slot('target')
                                    partner{{ $partner->id }}
                                @endslot
                            @endcomponent
                            
                            @component('admin.layouts.editButton')
                                @slot('target')
                                   partnerEdit{{ $partner->id }}
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
    @include('admin.partners.create')

    {{-- Show meetings --}}
    @include('admin.partners.show')

    {{-- Create meeting --}}
    @include('admin.partners.edit')

@endsection