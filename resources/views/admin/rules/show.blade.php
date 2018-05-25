@extends('admin.layouts.template')

@section('header')
    Rules
@endsection

@section('description')
    Manage your rules
@endsection

@section('content')
    @component('admin.layouts.components.box', ['title' => 'Rules','col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        
        <form class="form-horizontal" action="/admin/rules/{{ $rule->id }} " method="POST">
            @csrf @method('PUT')

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <textarea name="content" id="content" class="form-control" row="10" required> {!! $rule->content !!} </textarea> 
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