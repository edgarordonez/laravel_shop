@extends('dashboard.template')

@section('content')
@include('dashboard.partials.message')

    <h1 class="text-center">
      Pedidos
    </h1>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Subtotal</th>
            <th>Envio</th>
            <th>Total</th>
            </tr>
          </thead>
          <tbody>
          @foreach($orders as $order)
              <tr>
                <td>
                {!! Form::open(['route' => ['order.destroy', $order->id]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button onClick="return confirm('¿Esta seguro?')" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </button>                 
                {!! Form::close() !!}
                </td>
                <td>
                  <!-- COMPONENTE DE REACT (Incluyo el código en una subscarpeta dentro de resources) -->
                  <div class="modal-react" data-order="{{ $order->id }}"></div>
                </td>
                <td>{{ Date::parse($order->created_at)->diffForHumans() }}</td>             
                <td>{{ $order->user->name . " " . $order->user->last_name }}</td>
                <td>{{ number_format($order->subtotal,2) }}€</td>              
                <td>{{ number_format($order->shipping,2) }}€</td>  
                <td>{{ number_format($order->subtotal + $order->shipping,2) }}€</td>                      
              </tr>
          @endforeach
              <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>           
              </tr>		  
          </tbody>
      </table>
    </div>
    <hr>
    <div class="col-md-12 text-center">
      {!! $orders->render() !!}    
    </div>
@endsection
 