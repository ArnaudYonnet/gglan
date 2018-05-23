@extends('admin.layouts.template')

@section('header')
    Posts
@endsection

@section('description')
    Manage your posts reports
@endsection

@section('content')
    @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Posts
            &nbsp
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#postCreate">
                <i class="fas fa-plus"></i> Create
            </button>
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>Visibility</th>
                <th>Author</th>
                <th>Title</th>
                <th>Date</th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($posts as $key => $post)
                <tr>
                    <td> {{ $post->id }} </td>
                    @if ($post->visibility == "private")
                        <td><span class="label label-danger">{{ $post->visibility }}</span></td>
                    @else
                        <td><span class="label label-success">{{ $post->visibility }}</span></td>
                    @endif
                    <td> {{ $post->admin->name }} </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }} </td>
                    <td style="text-align: center;">
                        <form action="{{ $post->url->delete }}" method="POST">

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#post{{ $post->id }}">
                                <i class="fa fa-eye"></i> Read
                            </button>
                            &nbsp
                            <a href=" {{ $post->url->edit }} " class="btn btn-primary">
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
    @include('admin.posts.create')

    {{-- Show meetings --}}
    @include('admin.posts.show')

@endsection