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
</head>
<body>
  <table cellspacing="0" cellpadding="0" border="0" width="100%">
      <tr>
          <td bgcolor="#FFFFFF" align="center">
              <table width="650px" cellspacing="0" cellpadding="3" class="container">
                  <tr>
                      <td><h1>Información del pedido</h1></td>                 
                  </tr>
                  <tr>
                      <td><h4>{{ $user->name . " " . $user->last_name }}</h4></td>                      
                  </tr>  
                  <tr>
                      <td>
                        <p>Nos pondremos en contacto con usted lo antes posible para informarle sobre el estado de su pedido.</p>
                        <p>Le agradecemos su confianza.</p>
                      </td>                      
                  </tr>                                      
              </table>
          </td>
      </tr>
      <tr>
          <td bgcolor="#FFFFFF" align="center">
              <table width="650px" cellspacing="0" cellpadding="3" class="container">
                  <tr>
                      <td>
                          <hr>
                          <p>Gracias por comprar en <a href="http://shop.app">On wheels</a></p>
                      </td>
                  </tr>
              </table>
          </td>
      </tr>
  </table>
  <!-- jQuery -->
  <script src="{{ asset('js/jquery.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>