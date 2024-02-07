<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>

<body class="bg-light">
    <section class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 bg-dark text-light vh-100">
                @include('admin.layouts._sidebar')
            </div>
            <!-- /.col-lg-3 -->
            <main class="col-xl-10 col-lg-9">
                @yield('content')
            </main>
            <!-- /.col-lg-9 -->
        </div>
    </section>
</body>

</html>
