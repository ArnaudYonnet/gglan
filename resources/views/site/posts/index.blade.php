<div class="row">
    <h1 class="my-4">{{ __('The last news of') }} {{ config('app.name') }}</h1>
</div>

<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-4 col-md-5 col-sm-8">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="/posts/{{ $post->id }}">
                        <img class="card-img-top" src="{{ asset(Storage::url($post->logo)) }}"  style="max-width: 750px; max-height:300px;" alt="Image not found...">
                    </a>
                    <h2 class="card-title">{{ $post->title }}</h2>
                </div>
                <div class="card-footer text-muted">
                    {{ __('Posted on') }} {{ \Carbon\Carbon::parse($post->updated_at)->format('F j, Y') }} {{ __('By') }}
                    <u>{{ $post->admin->name }}</u>
                </div>
            </div>
        </div>
    @endforeach
</div>