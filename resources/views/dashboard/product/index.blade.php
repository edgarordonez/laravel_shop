@extends('dashboard.template')

@section('content')
@include('dashboard.partials.message')

    <h1 class="text-center">
      Productos
      <a href="{{ route('product.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i> Añadir producto</a>
    </h1>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Extracto</th>
            <th>Precio</th>
            <th>Visible</th>
            </tr>
          </thead>
          <tbody>
          @foreach($products as $product)
              <tr>
                <td>
                {!! Form::open(['route' => ['product.destroy', $product->slug]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button onClick="return confirm('¿Esta seguro?')" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </button>                 
                {!! Form::close() !!}
                </td>
                <td>
                  <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-primary">
                    <i class="fa fa-pencil"></i>
                  </a>
                </td>  
                <td><img src="{{ $product->image }}" width="250"></td>             
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>              
                <td>{{ $product->extract }}</td>  
                <td>{{ number_format($product->price,2) }}€</td>    
                <td>{{ $product->visible == 1 ? "Si" : "No" }}</td>                          
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
              <td>&nbsp;</td>              
              </tr>		  
          </tbody>
      </table>
    </div>
    <hr>
    <div class="col-md-12 text-center">
      {!! $products->render() !!}    
    </div>
@endsection