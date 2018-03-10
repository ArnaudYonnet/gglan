<nav class="navbar navbar-expand-md navbar-dark bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTarget" aria-controls="navbarTarget" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTarget">
        <a class="navbar-brand" href="/">
            <img src="/img/logov3.png" alt="GG-LAN" style='width: 130px;'>
        </a>
        
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                {{--  <li class="nav-item">
                    <a class="nav-link active" href="/tournois">Anciens Tournois</a>
                </li>  --}}
                <li class="nav-item">
                    <a class="nav-link active" href="/joueurs">Joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/equipes">Equipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/reglement">Réglement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/infos">Infos Pratiques</a>
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
                        <a class="dropdown-item" href="/profil/{{ Auth::user()->id_public }}">Mon Profil</a>
                        <a class="dropdown-item" href="/equipes/new">Mon Equipe</a>
                    @else
                        <a class="dropdown-item" href="/profil/{{ Auth::user()->id_public }}">Mon Profil</a>
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