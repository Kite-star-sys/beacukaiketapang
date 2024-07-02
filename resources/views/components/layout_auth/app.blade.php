<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BEACUKAI KETAPANG</title>

    <link rel="shortcut icon" href="{{ asset('public/img/logo-mini.svg') }}" type="image/x-icon">
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

<body class="login-screen">
    <x-alert.alert/>
    <div class="form">
        {{ $slot }}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery-3.7.1.js') }}"></script>
 <!-- bootstrap Bundle with Popper -->
 <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('js')
    <script>
         $('.show-password').click(function(){
            var $input = $(this).parent().find('input');
            var $icon = $(this).find('i');

            // Toggle password visibility
            if ($input.attr('type') === 'password') {
                $input.attr('type', 'text');
                $icon.removeClass('bi-eye-slash').addClass('bi-eye');
            } else {
                $input.attr('type', 'password');
                $icon.removeClass('bi-eye').addClass('bi-eye-slash');
            }
        });
    </script>

</body>

</html>
