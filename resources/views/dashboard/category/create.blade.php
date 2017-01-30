@extends('dashboard.template')

@section('content')
  <h1>
    Categorías <small>[Agregar categoría]</small>
  </h1>
  <div class="row text-center">
    <div class="col-md-offset-3 col-md-6">
        @include('dashboard.partials.errors')
        {!! Form::open(['route'=>'category.store']) !!}

            <div class="form-group">
                <label for="name">Nombre:</label>
                {!! 
                    Form::text(
                      'name',
                      null,
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Nombre categoría',
                          'autofocus' => 'autofocus'
                      )
                    )
                !!}
            </div>
            
            <div class="form-group">
                <label for="description">Descripción:</label>
                {!! 
                    Form::textarea(
                      'description', 
                      null, 
                      array(
                          'class'=>'form-control'
                      )
                    )
                !!}
            </div>
            
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" name="color" class="form-control">
            </div>
            
            <div class="form-group">
                {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                <a href="{{ route('category.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
  </div>
@endsection