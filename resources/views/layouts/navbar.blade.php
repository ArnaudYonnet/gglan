{{--  <nav class="navbar navbar-dark bg-dark">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item"><a href="/">Accueil</a></li>
        <li class="list-inline-item"><a href="/tournois">Anciens Tournois</a></li>
        <li class="list-inline-item"><a href="/joueurs">Joueurs</a></li>
        <li class="list-inline-item"><a href="/equipes">Equipes</a></li>
    </ul>
    @guest
        <div class="btn-group">
            <a class="btn btn-danger" href="{{ route('register') }}">Inscription</a>
            <br />
            <a class="btn btn-danger" href="{{ route('login') }}">Connexion</a>
        </div>
    @else
        <div class="btn-group right">
            <button type="button" class="btn btn-danger dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->pseudo }}
            </button>
            <div class="dropdown-menu">
                @if (Auth::user()->admin)
                    <a class="dropdown-item" href="/admin">Admin</a>
                @endif
                <a class="dropdown-item" href="/profil/{{ Auth::id() }}">Mon Profil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @endguest  
</nav>  --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <a class="navbar-brand" href="/">Accueil</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/tournois">Anciens Tournois</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/joueurs">Joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/equipes">Equipes</a>
                </li>
            </ul>
        @guest
            <div class="btn-group">
                <a class="btn btn-danger" href="{{ route('register') }}">Inscription</a>
                <br />
                <a class="btn btn-danger" href="{{ route('login') }}">Connexion</a>
            </div>
        @else
            <div class="btn-group right">
                <button type="button" class="btn btn-danger dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->pseudo }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/profil/{{ Auth::id() }}">Mon Profil</a>
                    <a class="dropdown-item" href="/equipes/new">Mon Equipe</a>
                    <div class="dropdown-divider">
                    </div>
                    @if (Auth::user()->admin)
                        <a class="dropdown-item" href="/admin">Admin</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endguest  
    </div>
</nav>