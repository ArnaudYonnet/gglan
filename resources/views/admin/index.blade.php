@extends('admin.layouts.template')

@section('header')
    {{ env('APP_NAME') }} | Dashboard
@endsection

@section('description')
    Managing everything
@endsection

@section('content')
    <h1>
        {{ __('Hello') }}, {{ Auth::guard('admin')->user()->name }} !
    </h1>
@endsection