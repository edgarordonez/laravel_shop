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

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>

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

    <!-- Star Rating JS -->
    <script src="{{ asset('bootstrap-star-rating/js/star-rating.js') }}" type="text/javascript"></script>
  </body>
</html>