<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (config('app.env') == "production")
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91334247-1 "></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', ' UA-91334247-1 ');
        </script>
    @endif
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    @include('site.layouts.assets.css')
    <title> {{ config('app.name') }} </title>
</head>
<body>
    @include('site.layouts.navbar')

    <div class="container-fluid mt-4 pl-4 pr-4">
        @include('flash::message')
        @yield('content')
    </div>

    @include('site.layouts.footer')

    @include('site.layouts.assets.script')

    @yield('script')
</body>
</html>