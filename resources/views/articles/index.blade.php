<div class="row pt-4">
        @isset($articles[0])
            <div class="col-md-12 col-lg-6 col-sm-10 pl-lg-5 pl-md-0">
                <div class="featured-article">
                    <a href="/articles/{{ $articles[0]->id }}">
                        <img src="http://placehold.it/1920x1080" style="width: 482px; height: 350px;" class="thumb">
                    </a>
                    <div class="block-title">
                        <h2>{{ $articles[0]->titre_article }}</h2>
                        <p class="by-author"><small>By {{ \App\User::find($articles[0]->id_user)->pseudo }}</small></p>
                    </div>
                </div>
            </div>
        @endisset
		<div class="col-md-7 col-lg-5 col-sm-12">
            <ul class="media-list main-list">
                @isset($articles[1])
                    <li class="media">
                    <a class="pull-left" href="/articles/{{ $articles[1]->id }}">
                        <img class="media-object" src="http://placehold.it/1920x1080" style="width: 150px; height: 90px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $articles[1]->titre_article }}</h4>
                        <p class="by-author">By {{ \App\User::find($articles[1]->id_user)->pseudo }}</p>
                    </div>
                    </li>
                @endisset
              
                @isset($articles[2])
                    <li class="media">
                    <a class="pull-left" href="/articles/{{ $articles[2]->id }}">
                        <img class="media-object" src="http://placehold.it/1920x1080" style="width: 150px; height: 90px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $articles[2]->titre_article }}</h4>
                        <p class="by-author">By {{ \App\User::find($articles[2]->id_user)->pseudo }}</p>
                    </div>
                    </li>
                @endisset
                
                @isset($articles[3])
                    <li class="media">
                        <a class="pull-left" href="/articles/{{ $articles[3]->id }}">
                        <img class="media-object" src="http://placehold.it/1920x1080" style="width: 150px; height: 90px;">
                        </a>
                        <div class="media-body">
                        <h4 class="media-heading">{{ $articles[3]->titre_article }}</h4>
                        <p class="by-author">By {{ \App\User::find($articles[3]->id_user)->pseudo }}</p>
                        </div>
                    </li>
                @endisset
			</ul>
		</div>
	</div>



    