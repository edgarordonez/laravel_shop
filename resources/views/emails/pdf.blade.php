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
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="container">
    <tr>
        <td>
            <h1 style="display: inline-block;">Factura del pedido:</h1>
            <h3 style="display: inline-block;"> nº{{ $order->id }}</h3>
        </td>
    </tr>
    <tr>
        <td><h3>Cliente: {{ $user->name . " " . $user->last_name }}</h3></td>
    </tr>
    <tr>
        <td>
            <h4>Añadimos la lista de tus productos: </h4>
            <hr>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <table width="650px" cellspacing="0" cellpadding="3" class="container">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                @foreach($orderItems as $orderItem)
                    <tr>
                        <td>
                            <img src="{{ $orderItem->product->image }}" alt="{{ $orderItem->product->name }}"
                                 width='150'/>
                        </td>
                        <td>{{ $orderItem->product->name }}</td>
                        <td>{{ $orderItem->product->price }}€</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ $orderItem->price }}€</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <hr>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td><h4>TOTAL: {{ $order->subtotal }}€</h4></td>
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
                        <h5>Para cualquier duda contacte con nosotros.</h5>
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