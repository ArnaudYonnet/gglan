@extends('admin.layouts.template')

@section('header')
    Meetings
@endsection

@section('description')
    Manage your meetings reports
@endsection

@section('content')
    @component('admin.layouts.components.box', ['title' => 'Meeting','col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        
        <form class="form-horizontal" action=" {{ $meeting->url->update }} " method="POST">
            @csrf @method('PUT')

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label for="title" class="control-label">Title</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $meeting->title }}" autofocus required>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <textarea name="content" id="content" class="form-control" row="10" required> {!! $meeting->content !!} </textarea> 
                    @if($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
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