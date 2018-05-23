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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#partnerCreate">
                <i class="fas fa-plus"></i> Create
            </button>
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

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#partner{{ $partner->id }}">
                                <i class="fa fa-eye"></i> Read
                            </button>
                            &nbsp
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partnerEdit{{ $partner->id }}">
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
    
    {{-- Create meeting --}}
    @include('admin.partners.create')

    {{-- Show meetings --}}
    @include('admin.partners.show')

    {{-- Create meeting --}}
    @include('admin.partners.edit')

@endsection