<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title> @yield('title') </title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            Banniere
        </div>
        <div class="row">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a href="#">Accueil</a></li>
                <li class="list-inline-item"><a href="#">Anciens Tournois</a></li>
                <li class="list-inline-item"><a href="#">Joueurs</a></li>
                <li class="list-inline-item"><a href="#">Equipes</a></li>
                <li class="list-inline-item"><a href="#">Connexion</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container float-left col-lg-9">
            Page
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
    </footer>
</body>
</html>