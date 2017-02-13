@extends('dashboard.template')

@section('content')
@include('dashboard.partials.message')

    <h1 class="text-center">
      Usuarios
      <a href="{{ route('user.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i> Añadir usuario</a>
    </h1>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Activo</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
              <tr>
                <td width="50">
                {!! Form::open(['route' => ['user.destroy', $user]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button onClick="return confirm('¿Esta seguro?')" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </button>                 
                {!! Form::close() !!}
                </td>
                <td width="50">
                  <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">
                    <i class="fa fa-pencil"></i>
                  </a>
                </td>  
                <td>{{ $user->name }}</td>             
                <td>{{ $user->last_name }}</td>           
                <td>{{ $user->email }}</td>  
                <td>{{ $user->type }}</td>    
                <td>{{ $user->active == 1 ? "Si" : "No" }}</td>                          
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
      {!! $users->render() !!}    
    </div>
@endsection