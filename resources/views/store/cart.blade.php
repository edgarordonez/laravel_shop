@extends('template')

@section('content')
@include('common.message')
<div class="row">
  <h1 style="padding-left: 15px;">Carrito</h1>
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
                  <a href="javascript::void(0)" class="btn btn-default btn-update-item" data-href="{{ route('cart-update', $product->slug) }}" data-id="{{ $product->id }}">
                    <i class="fa fa-refresh"></i>
                  </a>
                </td>
                <td id="price_quantity_{{ $product->id }}">{{ money_format('%.2n', $product->price) }}€</td>
                <td id="price_total_{{ $product->id }}">{{ money_format('%.2n', $product->price * $product->quantity) }}€</td>
              </tr>
          @endforeach
              <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><strong id="price_total_table">{{ money_format('%.2n', $currentTotalCart) }}€</strong></td>
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
        <a href="{{ route('home') }}" style="padding-left: 20px;">
          <button class="btn btn-success">
            Seguir comprando
          </button>
        </a>
        @if(Auth::check())
          <a href="{{ route('payment') }}">
            <button class="btn btn-success pull-right">
              <i class="fa fa-paypal"></i>
              Pagar
            </button>
          </a>
        @else
          <a href="{{ route('login') }}">
            <button class="btn btn-success pull-right">
              Continuar
            </button>
          </a>
        @endif
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-3 col-md-offset-1 well">
    <h3>Resumen de compra</h3>
    <small class="text-muted">Gastos envío estimados: 5,75€</small>
    <hr />
    @if(Auth::check())
      <h5>Nombre:</h5>
      <small class="text-muted">{{ Auth::user()->name }}</small>
      <h5>Dirección:</h5>
      <small class="text-muted">{{ Auth::user()->address }}</small>
      <h5>email:</h5>
      <small class="text-muted">{{ Auth::user()->email }}</small>
      <hr>
    @endif
    <h4 id="price_total_detail">Total: {{ money_format('%.2n', $currentTotalCart) }}€</h4>
  </div>
  @else
    <div class="col-xs-12 col-md-12 text-center">
      <h1>No hay items en el carrito.</h1>
    </div>
  @endif 
</div>

<hr>
@endsection