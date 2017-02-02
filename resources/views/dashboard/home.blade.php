@extends('dashboard.template')

@section('content')
<ul class="flex-container">
  <a href="{{ route('category.index') }}" class="nounderline">
    <li class="flex-item">
      <i class="fa fa-bookmark"></i>
      Categorías
    </li>
  </a>
  <a href="{{ route('product.index') }}" class="nounderline">
    <li class="flex-item">
      <i class="fa fa-shopping-cart"></i>   
      Productos
    </li>
  </a>
  <a href="{{ route('order.index') }}" class="nounderline">
    <li class="flex-item">
      <i class="fa fa-cc-paypal"></i>
      Pedidos
    </li>
  </a>
  <a href="{{ route('user.index') }}" class="nounderline">
    <li class="flex-item">
      <i class="fa fa-user-circle"></i>
      Usuarios
    </li>
  </a>
</ul>
@endsection