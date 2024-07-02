<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KEPALA KANTOR</title>

    <link rel="stylesheet" href="{{ asset('node_modules/animate.css/animate.min.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('public/src/font.css') }}">
    <!-- Bootstrap Icons Css -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Data Tables Css -->
    <link rel="stylesheet" href="{{ asset('public/src/datatables/dataTables.tailwindcss.css') }}">
    <!-- App Css -->
    <link rel="stylesheet" href="{{ asset('public/src/tailwind.css') }}">

</head>

<body class="app-screen">

    <header class="main-header">
        <x-layout_kk.nav-top />
        <x-layout_kk.nav-bottom />

    </header>

    <section class="content mt-5">
        <div class="container">
            <x-alert.alert/>
            {{ $slot }}
        </div>
    </section>
    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery-3.7.1.js') }}"></script>
    <!-- bootstrap Bundle with Popper -->
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Data Tables Js -->
    <script src="{{ asset('public/src/datatables/dataTables.js') }}"></script>
    <!-- Data Tables Tailwind js -->
    <script src="{{ asset('public/src/datatables/dataTables.tailwindcss.js') }}"></script>
    <!-- App Js -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    @stack('js')

</body>

</html>
