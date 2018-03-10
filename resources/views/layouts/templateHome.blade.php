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
    {{--  Menu  --}}
    <div class="container-fluid">
        @include('layouts.navbar')
    </div>


    {{--  Partenaires  --}}
    <div class="container-fluid pt-4 pl-4 pr-4">
        <div class="row">
            <div class="container col-lg-9 col-md-9 col-sm-9 bg-danger rounded">
                <div class="row">
                    <div class="col-lg-2 mx-auto px-auto">
                        <p class="text-white">
                            MERCI A NOS
                            <br />PARTENAIRES
                        </p>
                    </div>
                    <div class="col-lg-10">
                        <ul class="list-inline text-white">
                            <li class="list-inline-item">
                                <img class="partenaires" src="/img/partenaires/brestopencampus.png" alt="Brest Open Campus">
                            </li>
                            <li class="list-inline-item">
                                <img class="partenaires" src="/img/partenaires/xankom.png" alt="Xankom">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="container col-lg-2 col-md-2 col-sm-9  mt-lg-0 mt-md-0 mt-sm-2 mt-2 bg-secondary rounded">
                <div class="row">
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
    </div>

    {{--  Page  --}}
    <div class="container-fluid">
        <div class="container col-lg-9 float-lg-left  main">
            @yield('content')
        </div>
    </div>

    {{--  Footer  --}}
    <div class="container-fluid">
        <footer class="footer bg-danger">
            <p class="text-white">
                Toutes personnes non-inscrites ne sera pas accepté à l'entrée de la lan.
                <br /> Pour les visiteurs, pièce d'identité obligatoire.
            </p>
        </footer>
    </div>


    @include('layouts.script')
</body>
</html>