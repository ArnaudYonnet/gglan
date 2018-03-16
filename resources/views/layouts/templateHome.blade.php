<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GG-LAN</title>
    
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    <link rel="stylesheet" href="{{ asset('css/darkly.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}"> 
    <link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
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
            <div class="container col-lg-9 col-md-9 col-sm-9 bg-secondary rounded">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <p class="text-white text-center">
                            MERCI A NOS PARTENAIRES
                        </p>
                    </div>
                        {{--  <ul class="list-inline">
                            @foreach ($partenaires as $partenaire)
                                <li class="list-inline-item">
                                    <a href="{{ $partenaire->site_partenaire }}" target="_blank">
                                        <img src="{{ $partenaire->img_partenaire }}" 
                                            alt="{{ $partenaire->nom_partenaire }}" 
                                            title="{{ $partenaire->nom_partenaire }}"
                                            class="img-fluid  partenaires">
                                    </a>
                                </li>
                            @endforeach
                        </ul>  --}}
                        @foreach ($partenaires as $partenaire)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <a href="{{ $partenaire->site_partenaire }}" target="_blank">
                                    <img src="{{ $partenaire->img_partenaire }}" 
                                        alt="{{ $partenaire->nom_partenaire }}" 
                                        title="{{ $partenaire->nom_partenaire }}"
                                        class="img-fluid">
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
            
            <div class="container col-lg-2 col-md-2 col-sm-9  mt-lg-0 mt-md-0 mt-sm-2 mt-2 rounded">
                <div class="row">
                    <div class="col-lg-12">
                        @if($tournois)
                                @foreach ($tournois as $tournoi)
                                    <p class="text-white">
                                        <u>
                                            La <b>{{ $tournoi->nom_tournois }}</b> 
                                            aura lieu du 
                                            {{ \Carbon\Carbon::parse($tournoi->date_deb)->format('d/m/Y') }} 
                                            au 
                                            {{ \Carbon\Carbon::parse($tournoi->date_fin)->format('d/m/Y') }}
                                        </u>
                                    </p>
                                @endforeach
                            @else
                                <p class="text-white">Pas de LAN annoncé pour le moment...</p>
                            @endif
                    </div>

                    {{--  @foreach ($partenaires as $partenaire)
                        <div class="col-lg-6 col-md-12 col-sm-2">
                            <a href="{{ $partenaire->site_partenaire }}" target="_blank">
                                <img class="img-fluid" src="{{ $partenaire->img_partenaire }}" 
                                    alt="{{ $partenaire->nom_partenaire }}" 
                                    title="{{ $partenaire->nom_partenaire }}">
                            </a>
                        </div>
                    @endforeach  --}}
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
        <div class="footer">
            <p class="text-white bg-secondary">
                Toute personne non-inscrite ne sera pas acceptée à l'entrée de la lan.
                <br /> Pour les visiteurs, pièce d'identité obligatoire.
                <br />
                <div style="text-align: center;">
                    <i class="far fa-copyright"></i> 
                    GG-LAN 2018 | Code by <a href="https://thibaud-philippi.com" class="text-danger">Thibaud Philippi</a>
                </div>
            </p>
        </div>
    </div>


    @include('layouts.script')
</body>
</html>