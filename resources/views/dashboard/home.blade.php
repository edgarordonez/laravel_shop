@extends('dashboard.template')

@section('content')
    <ul class="flex-container">
        <li class="flex-item">
            <a href="{{ route('category.index') }}" class="customlink">
                <i class="fa fa-bookmark"></i>
                <span class="title-dashboard">Categorías</span>
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('product.index') }}" class="customlink">
                <i class="fa fa-shopping-cart"></i>
                <span class="title-dashboard">Productos</span>
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('order.index') }}" class="customlink">
                <i class="fa fa-cc-paypal"></i>
                <span class="title-dashboard">Pedidos</span>
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('user.index') }}" class="customlink">
                <i class="fa fa-user-circle"></i>
                <span class="title-dashboard">Usuarios</span>
            </a>
        </li>
        <li class="flex-item">
            <a href="{{ route('chat') }}" class="customlink">
                <i class="fa fa-commenting-o"></i>
                <span class="title-dashboard">Chat</span>
            </a>
        </li>
    </ul>
@endsection