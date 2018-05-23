@extends('site.layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mt-4"> {{ $post->title }} </h1>
                <p class="lead">
                    {{ __('By') }} <u> {{ $post->admin->name }} </u>
                </p>
                <hr>
                <p> {{ __('Posted on') }} {{ \Carbon\Carbon::parse($post->updated_at)->format('F j, Y') }} </p>
                <hr>
        
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ asset(Storage::url($post->logo)) }}" style="max-width: 900px;" alt="No image found...">
        
                <hr>
        
                <!-- Post Content -->
                {!! $post->content !!}
        
            </div>
        </div>
    </div>
@endsection
