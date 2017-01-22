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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">

</head>
<body>
  {{ setlocale(LC_MONETARY, 'es_ES') }}
  @include('store.partials.nav')

  <div class="container">
    @yield('content')

    @include('store.partials.footer')
  </div>

  <!-- jQuery -->
  <script src="{{ asset('js/jquery.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>