<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GG-LAN</title>
    
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    <link rel="stylesheet" href="{{ asset('css/darkly.min.css') }}">
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
        <div class="container float-left col-lg-10 col-md-10 col-sm-12 pl-4 pt-4 main">
            @yield('content')
        </div>
        
        <div class="container float-right col-lg-2 col-md-2 col-sm-12 pt-4 pr-4">
            <div class="row bg-secondary rounded">
                <div class="col-lg-12">
                        @isset($tournois)
                            <p class="text-white">
                                La <b>{{ $tournois->nom_tournois }}</b> 
                                aura lieu du 
                                {{ \Carbon\Carbon::parse($tournois->date_deb)->format('d/m/Y') }} 
                                au 
                                {{ \Carbon\Carbon::parse($tournois->date_fin)->format('d/m/Y') }}
                            </p>
                        @else
                            <p class="text-white">Pas de LAN annoncée pour le moment...</p>
                        @endisset
                    </div>
                    @foreach ($partenaires as $partenaire)
                        <div class="col-lg-6 col-md-12 col-sm-2">
                            <p>Nos partenaires</p>
                            <a href="{{ $partenaire->site_partenaire }}" target="_blank">
                                <img style="width: 75px" class="img-fluid" src="{{ $partenaire->img_partenaire }}" 
                                    alt="{{ $partenaire->nom_partenaire }}" 
                                    title="{{ $partenaire->nom_partenaire }}">
                            </a>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <footer class="footer bg-danger">
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