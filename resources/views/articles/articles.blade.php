<div class="card-columns">
    @foreach ($articles as $article)
    <div class="card" style="width: 20rem;">
        <h5 class="card-header">
            <a href="/articles/{{ $article->id_article }}"> {{ $article->titre_article }} </a>
        </h5>
        <div class="card-body">
        </div>
    </div>
    @endforeach
</div>