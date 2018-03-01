<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}" >  --}}

    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetAlert.js') }}"></script>
    <title> @yield('title') </title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{--  Banniere  --}}
        </div>
        @include('layouts.navbar')
    </div>

    <div class="container-fluid">
        <div class="container float-left col-lg-10">
            @yield('content')
        </div>

        <div class="container float-right col-lg-2">
            <div class="row">Prochaine LAN</div>
            <div class="row">Partenaires</div>
        </div>
    </div>

    
    <footer class="footer">
        <div class="container">
            <p>
                Toutes personnes non-inscrites ne sera pas accepté à l'entrée de la lan.
                <br /> Pour les visiteurs, pièce d'identité obligatoire.
            </p>
        </div>
        
        <script>
            $('div.alert').delay(3000).slideUp(350);
        </script>
    </footer>
</body>
</html>