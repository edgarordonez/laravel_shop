@extends('dashboard.template')

@section('content')
    <ul class="flex-container">
        <li class="flex-item">
            <a href="{{ route('category.index') }}" class="customlink">
                <i class="fa fa-bookmark"></i>
                Categorías
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('product.index') }}" class="customlink">
                <i class="fa fa-shopping-cart"></i>
                Productos
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('order.index') }}" class="customlink">
                <i class="fa fa-cc-paypal"></i>
                Pedidos
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('user.index') }}" class="customlink">
                <i class="fa fa-user-circle"></i>
                Usuarios
            </a>
        </li>
    </ul>
@endsection