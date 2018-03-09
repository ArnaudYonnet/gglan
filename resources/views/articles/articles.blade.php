<div class="row">
    @foreach ($articles as $article)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
        <div class="card">
            <h5 class="card-header">
                <a href="/articles/{{ $article->id_article }}"> {{ $article->titre_article }} </a>
            </h5>
            <div class="card-body">
            </div>
        </div>
        @endforeach
    </div>
</div>