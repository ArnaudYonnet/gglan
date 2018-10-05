<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ env('APP_NAME') }} | Dashboard</title>
    <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} ">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('admin.layouts.assets.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.templates.header')

        @include('admin.layouts.templates.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('header')
                    <small>@yield('description')</small>
                </h1>
                    
                    @include('admin.layouts.templates.breadcrumb')
            </section>

            <section class="content container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        @include('flash::message')
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>

        @include('admin.layouts.templates.footer')
    </div>

    @include('admin.layouts.assets.script')
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(350);
        $(function () {
            CKEDITOR.replace('content');
        })
    </script>
</body>
</html>