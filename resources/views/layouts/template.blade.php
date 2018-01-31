<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title> @yield('title') </title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            Banniere
        </div>
        <div class="row">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a href="/">Accueil</a></li>
                <li class="list-inline-item"><a href="/tournois">Anciens Tournois</a></li>
                <li class="list-inline-item"><a href="/joueurs">Joueurs</a></li>
                <li class="list-inline-item"><a href="/equipes">Equipes</a></li>

                @guest
                    <li class="list-inline-item"><a href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li><a href="/profil/{{ Auth::id() }}">Profil</a></li>
                    @if (Auth::user()->admin)
                        <li><a href="/admin">Admin</a></li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container float-left col-lg-9">
            @yield('content')
        </div>

        <div class="container float-right col-lg-2">
            <div class="row">Prochaine LAN</div>
            <div class="row">Partenaires</div>
        </div>
    </div>

    <footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $('div.alert').delay(3000).slideUp(350);
        </script>
    </footer>
</body>
</html>