<div class="form-group">
  <label for="name">Nombre:</label>
  {!! 
        Form::text(
            'name', 
            null, 
            array(
                'class'=>'form-control',
                'placeholder' => 'Nombre',
                'autofocus' => 'autofocus'
            )
        ) 
    !!}
</div>

<div class="form-group">
  <label for="last_name">Apellidos:</label>
  {!! 
      Form::text(
          'last_name', 
          null, 
          array(
              'class'=>'form-control',
              'placeholder' => 'Apellidos'
          )
      ) 
  !!}
</div>

<div class="form-group">
  <label for="email">Correo:</label>
  {!! 
      Form::text(
          'email', 
          null, 
          array(
              'class'=>'form-control',
              'placeholder' => 'Correo'
          )
      ) 
  !!}
</div>

<div class="form-group">
  <label for="type">Tipo:</label>
  @php
    $valueUser = (isset($user)) ? ($user->type == 'user') ? true : null : null;
    $valueAdmin = (isset($user)) ? ($user->type == 'admin') ? true : null : null;
  @endphp
  {!! Form::radio('type', 'user', $valueUser) !!} User
  {!! Form::radio('type', 'admin', $valueAdmin) !!} Admin
</div>        

<div class="form-group">
  <label for="address">Dirección:</label>
  {!! 
      Form::textarea(
          'address', 
          null, 
          array(
              'class'=>'form-control'
          )
      ) 
  !!}
</div>

<div class="form-group">
  <label for="active">Activo:</label>
  @php
    $value = (isset($user)) ? ($user->active == 1) ? true : null : null;
  @endphp  
  {!! Form::checkbox('active', null, $value)!!}
</div>

<br>

<fieldset>
  <strong>Cambiar password:</strong>
  <div class="form-group">
    <label for="password">Nuevo Password:</label>
    {!! 
      Form::password(
          'password', 
          array(
              'class'=>'form-control'
          )
      ) 
    !!}
  </div>
                              
  <div class="form-group">
    <label for="confirm_password">Confirmar Password:</label>
    {!! 
      Form::password(
          'password_confirmation',
          array(
              'class'=>'form-control'
          )
      ) 
    !!}
  </div>
</fieldset>

<div class="form-group">
    {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
    <a href="{{ route('user.index') }}" class="btn btn-default">Cancelar</a>
</div>