@extends('admin.layouts.template')

@section('header')
    Posts
@endsection

@section('description')
    Manage your posts reports
@endsection

@section('content')
    @component('admin.layouts.components.box', ['title' => 'Post','col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        
        <form class="form-horizontal" action=" {{ $post->url->update }} " method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" name="visibility" value=" {{ $post->visibility }} ">

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label for="title" class="control-label">Title</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" autofocus required>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <textarea name="content" id="content" class="form-control" row="10" required> {!! $post->content !!} </textarea> 
                    @if($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('visibility') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label for="name" class="control-label">Visibility</label>
                    <select name="visibility" id="visibility" class="form-control">
                        @if ($post->visibility == "private")
                            <option value="{{ $post->visibility }}" selected>Private</option>
                            <option value="public">Public</option>
                        @else
                            <option value="{{ $post->visibility }}" selected>Public</option>
                            <option value="private">Private</option>
                        @endif
                    </select>
                    @if ($errors->has('visibility'))
                        <span class="help-block">
                            <strong>{{ $errors->first('visibility') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <img src="{{ asset(Storage::url($post->logo)) }}" alt="No logo..." style="max-width: 150px">
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label for="logo" class="control-label">Logo</label>
                    <input id="logo" type="file" name="logo" value="{{ old('logo') }}">
                    @if ($errors->has('logo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group pull-right">
                <div class="col-xs-12">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </form>
    @endcomponent
@endsection