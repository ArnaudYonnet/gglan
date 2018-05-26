@extends('admin.layouts.template')

@section('header')
    {{ __('Roles') }}
@endsection

@section('description')
    {{ __('Manage your roles') }}
@endsection

@section('content')
   @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            {{ __('Roles') }}
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'roleCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>{{ __('Name') }}</th>
                <th>{{ __('Players') }}</th>
                <th>{{ __('Tournaments') }}</th>
                <th>{{ __('Meetings') }}</th>
                <th>{{ __('Posts') }}</th>
                <th>{{ __('Partners') }}</th>
                <th>{{ __('Admins') }}</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($roles as $role)
                    <tr>
                        <td> {{ $role->name }} </td>
                        <td> {!! $role->players  ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>
                        <td> {!! $role->tournaments ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>
                        <td> {!! $role->meetings ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>
                        <td> {!! $role->posts    ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>
                        <td> {!! $role->partners ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>
                        <td> {!! $role->admins   ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-times text-danger"></i>' !!} </td>

                        
                        <td style="text-align: center;">
                            <form action="{{ $role->url->delete }}" method="POST">

                                <button type="button" class="btn btn-primary" {{ $role->important ? 'disabled':'' }} data-toggle="modal" data-target="#roleEdit{{ $role->id }}">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </button>
                                &nbsp
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" {{ $role->important ? 'disabled':'' }}>
                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
    
    {{-- Create role --}}
    @include('admin.roles.create')

    {{-- Edit role --}}
    @include('admin.roles.edit')
@endsection