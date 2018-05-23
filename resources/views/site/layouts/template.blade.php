<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
</body>
</html>