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

    <!-- Star rating CSS -->
    <link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>

@include('store.partials.nav')

<div class="container">
    @yield('content')

    @include('store.partials.footer')
</div>
<!-- JS -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<!-- Star Rating JS -->
<script src="{{ asset('bootstrap-star-rating/js/star-rating.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $('.ratingProduct').rating({displayOnly: true})
</script>
</body>
</html>