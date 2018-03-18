<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/img/logov3.png" alt="GG-LAN" style='width: 130px;'>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTarget" aria-controls="navbarTarget" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarTarget">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/joueurs">Joueurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/equipes">Equipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tournois">Tournois</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/reglement">Réglement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/infos">Infos Pratiques</a>
            </li>
        </ul>
        @guest
            <div class="btn-group">
                <a class="btn btn-danger" href="{{ route('register') }}">Inscription</a>
                <br />
                <a class="btn btn-danger" href="{{ route('login') }}">Connexion</a>
            </div>
        @else
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->type == "Joueur")
                        {{ Auth::user()->pseudo }}
                    @else
                        {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (Auth::user()->type == "Joueur")
                        <a class="dropdown-item" href="/joueurs/{{ Auth::user()->id }}">Mon Profil</a>
                        <a class="dropdown-item" href="/equipes/create">Mon Equipe</a>
                    @else
                        <a class="dropdown-item" href="/joueurs/{{ Auth::user()->id }}">Mon Profil</a>
                    @endif
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