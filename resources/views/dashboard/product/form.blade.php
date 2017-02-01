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
@php 
    $value = (isset($product)) ? ($product->visible == 1) ? true : null : null;
@endphp
{!! 
    Form::checkbox(
        'visible', 
        $value,
        array(
            'class' => 'form-control',
        )
    ) 
!!}
</div>                       

<div class="form-group">
    {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
    <a href="{{ route('product.index') }}" class="btn btn-default">Cancelar</a>
</div>