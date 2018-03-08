<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/fontawesome-all.min.css') }}">

    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetAlert.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        @include('layouts.navbar')
    </div>

    <div class="container-fluid">
        <div class="container float-left col-lg-10 main">
                @yield('content')
        </div>
        
        <div class="container float-right col-lg-2">
                <div class="row bg-dark">
                    <p class="text-white">Prochaine LAN</p>
                </div>
                <div class="row bg-dark">
                    <ul class="list-inline">
                        @foreach ($partenaires as $partenaire)
                        <li>
                            <a href="{{ $partenaire->site_partenaire }}" target="_blank">
                                        <img style="width: 75px" src="{{ $partenaire->img_partenaire }}" 
                                             alt="{{ $partenaire->nom_partenaire }}" 
                                             title="{{ $partenaire->nom_partenaire }}">
                                    </a>
                        </li>
                        <br /> @endforeach
                    </ul>
                </div>
        </div>
    </div>


    <div class="container-fluid">
        <footer class="footer bg-dark">
            <p class="text-white">
                Toutes personnes non-inscrites ne sera pas accepté à l'entrée de la lan.
                <br /> Pour les visiteurs, pièce d'identité obligatoire.
            </p>
        </footer>
    </div>





    <script>
        $('div.alert').delay(3000).slideUp(350);
    </script>
</body>
</html>