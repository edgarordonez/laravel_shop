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
    @if(isset($category))
    <input type="color" name="color" class="form-control" value="{{ $category->color }}">                
    @else
    <input type="color" name="color" class="form-control">                
    @endif
</div>

<div class="form-group">
    {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
    <a href="{{ route('category.index') }}" class="btn btn-default">Cancelar</a>
</div>