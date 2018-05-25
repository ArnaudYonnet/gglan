@extends('admin.layouts.template')

@section('header')
    {{ $user->name }} | {{ __('Settings') }}
@endsection

@section('description')
    {{  __('Manage your settings') }}
@endsection

@section('content')
    @component('admin.layouts.components.box', ['title' => 'Settings', 'col' => 'col-xs-12', 'color' => 'info', 'class' => ''])
        <form action="/admin/settings" method="POST" class="form-horizontal">
            @csrf 
            <input type="hidden" name="user_id" value=" {{ Auth::guard('admin')->user()->id }} ">

            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 col-form-label text-md-right"> {{ __('Name') }} </label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <button class="btn btn-success" type="submit"> {{ __('Update') }} </button>
        </form>
    @endcomponent
@endsection