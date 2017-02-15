@extends('dashboard.template')

@section('content')
@include('common.message')

    <h1 class="text-center">
      Categorías
      <a href="{{ route('category.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i> Añadir categoría</a>
    </h1>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Color</th>
            </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
              <tr>
                <td>
                {!! Form::open(['route' => ['category.destroy', $category]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button onClick="return confirm('¿Esta seguro?')" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </button>                 
                {!! Form::close() !!}
                </td>
                <td>
                  <a href="{{ route('category.edit', $category) }}" class="btn btn-primary">
                    <i class="fa fa-pencil"></i>
                  </a>
                </td>    
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>  
                <td>{{ $category->color }}</td>                              
              </tr>
          @endforeach
              <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>		  
          </tbody>
      </table>
    </div>
@endsection