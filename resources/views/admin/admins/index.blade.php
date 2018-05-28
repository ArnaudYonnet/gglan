@extends('admin.layouts.template')

@section('header')
    Admins
@endsection

@section('description')
    {{ __('Manage your admins') }}
@endsection

@section('content')

   @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Admins
            &nbsp
            @component('admin.layouts.createButton', ['target' => 'adminCreate'])
            @endcomponent
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Role') }}</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($admins as $admin)
                    <tr>
                        <td> {{ $admin->id }} </td>
                        <td> {{ $admin->name }} </td>
                        <td> {{ $admin->email }} </td>
                        <td> {{ $admin->role->name }} </td>
                        
                        <td style="text-align: center;">
                            <form action="{{ $admin->url->delete }}" method="POST">

                                @component('admin.layouts.readButton')
                                    @slot('target')
                                        admin{{ $admin->id }}
                                    @endslot
                                @endcomponent

                                @component('admin.layouts.editButton')
                                    @slot('target')
                                        adminEdit{{ $admin->id }}
                                    @endslot
                                @endcomponent

                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger @adminDisabled" @adminDisabled>
                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                </button>
                                

                                {{-- @if (Auth::guard('admin')->user()->role->id == 1 && $admin->id != Auth::guard('admin')->user()->id)
                                    @if (App\Admin::where('role_id', 1)->count() > 1)
                                        <a href="{{ $admin->url->edit }}/edit" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        &nbsp
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    @else
                                        <a href="/admin/admins/{{ $admin->url->edit }}/edit" class="btn btn-primary {{ $admin->role->important ? 'disabled':'' }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        &nbsp
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" {{ $admin->role->important ? 'disabled':'' }}>
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    @endif
                                @else
                                    <a href="/admin/admins/{{ $admin->url->edit }}/edit" class="btn btn-primary {{ $admin->role->important ? 'disabled':'' }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    &nbsp
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger" {{ $admin->role->important ? 'disabled':'' }}>
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                @endif --}}

                            </form>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
    
    {{-- Create admin --}}
    @include('admin.admins.create')

    {{-- Show admin --}}
    @include('admin.admins.show')

    {{-- Edit admin --}}
    @include('admin.admins.edit')
@endsection