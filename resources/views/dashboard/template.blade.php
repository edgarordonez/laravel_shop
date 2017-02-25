<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ON WHEELS')</title>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
@include('dashboard.partials.nav')

<div class="container">
    @yield('content')

    @include('dashboard.partials.footer')
</div>

<!-- JS -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>