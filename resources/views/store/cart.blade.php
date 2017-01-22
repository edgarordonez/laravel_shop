@extends('template')

@section('content')
<div class="row">
  <h1 style="padding-left: 15px;">Shopping Cart</h1>
  <br>
  @if(count($cart))
  <div class="col-xs-12 col-md-8">
    <div class="table-responsive">
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
                    <img class="img-responsive" src="{{ $product->image }}">
                  </a>
                </td>
                <td>{{ $product->name }}</td>
                <td>
                  <input id="product_{{ $product->id }}" class="input-mini" type="number" min="1" max="10" value="{{ $product->quantity }}">
                  <a
                    href="javascript::void(0)"
                    class="btn btn-default btn-update-item"
                    data-href="{{ route('cart-update', $product->slug) }}"
                    data-id="{{ $product->id }}"
                  >
                    <i class="fa fa-refresh"></i>
                  </a>
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
    </div>
    <div class="row" style="padding-bottom: 20px;">
      <div class="col-xs-12 col-md-12">
        <a href="{{ route('cart-remove') }}">
          <button class="btn btn-primary pull-left">
            Vaciar carrito
          </button>
        </a>
        <a href="{{ route('home') }}">
          <button class="btn btn-success pull-right">
            Seguir comprando
          </button>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-3 col-md-offset-1 well">
    <h3>Resumen de compra</h3>
    <small class="text-muted">Gastos envío estimados: 5,75€</small>
    <hr />
    <h4>Total: {{ money_format('%.2n', $total) }}€</h4>
  </div>
  @else
    <div class="col-xs-12 col-md-12 text-center">
      <h1>No hay items en su carrito.</h1>
    </div>
  @endif 
</div>

<hr>
@endsection