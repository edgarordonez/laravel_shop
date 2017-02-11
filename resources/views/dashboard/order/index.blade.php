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
                <td width="50">
                {!! Form::open(['route' => ['order.destroy', $order->id]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button onClick="return confirm('¿Esta seguro?')" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </button>                 
                {!! Form::close() !!}
                </td>
                <td width="50">
                  <a href="#" class="btn btn-primary btn-modal" data-toggle="modal" data-target="#modal_{{$order->id}}">
                    <i class="fa fa-pencil"></i>
                  </a>                
                  @include('dashboard.order.modal')                  
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
 