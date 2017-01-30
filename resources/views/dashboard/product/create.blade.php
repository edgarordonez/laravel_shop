@extends('dashboard.template')

@section('content')
  <h1>
    Productos <small>[Agregar producto]</small>
  </h1>
  <div class="row text-center">
    <div class="col-md-offset-3 col-md-6">
        @include('dashboard.partials.errors')
        {!! Form::open(['route'=>'product.store']) !!}

            <div class="form-group">
              <label class="control-label" for="category_id">Categoría</label>
              {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="name">Nombre:</label>
                {!! 
                    Form::text(
                      'name',
                      null,
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Nombre producto',
                          'autofocus' => 'autofocus'
                      )
                    )
                !!}
            </div>
            
            <div class="form-group">
                <label for="exctract">Extracto:</label>
                {!! 
                    Form::text(
                      'extract', 
                      null, 
                      array(
                          'class'=>'form-control'
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
                <label for="price">Precio:</label>
                {!! 
                    Form::text(
                      'price', 
                      null, 
                      array(
                          'class'=>'form-control'
                      )
                    )
                !!}
            </div>
            
            <div class="form-group">
            <label for="image">Imagen:</label>

            {!! 
                Form::text(
                    'image', 
                    null, 
                    array(
                        'class'=>'form-control',
                        'placeholder' => 'Ingresa la url de la imagen...',
                    )
                ) 
            !!}
            </div>        

            <div class="form-group">
            <label for="visible">Visible:</label>
            {!! 
                Form::checkbox(
                    'visible', 
                    null, 
                    array(
                        'class'=>'form-control',
                    )
                ) 
            !!}
            </div>                       

            <div class="form-group">
                {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                <a href="{{ route('product.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
  </div>
@endsection