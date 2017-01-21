@extends('template')

@section('content')
<div class="row">
  <h1> Shopping Cart</h1>
  <br>
  @if(count($cart))
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>Eliminar</th>
          <th>Imagen</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cart as $product)
            <tr>
              <td>
                <a href="{{ route('cart-delete', $product->slug) }}" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </a>
              </td>
              <td class="muted center_text">
                <a href="{{ route('product-detail', $product->slug) }}">
                  <img src="{{ $product->image }}">
                </a>
              </td>
              <td>{{ $product->name }}</td>
              <td>
                <input type="text" placeholder="1" class="input-mini">
              </td>
              <td>{{ money_format('%.2n', $product->price) }}€</td>
              <td>{{ money_format('%.2n', $product->price * $product->quantity) }}€</td>
            </tr>
        @endforeach
            <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>{{ money_format('%.2n', $total) }}€</strong></td>
            </tr>		  
        </tbody>
    </table>
  @else
    <div class="col-md-12 text-center">
      <h1>No hay items en su carrito.</h1>
    </div>
  @endif 
</div>
@endsection