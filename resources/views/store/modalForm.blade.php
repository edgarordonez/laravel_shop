<div class='modal fade' id="comment" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Escribe tu opinión: </h4>
      </div>
      <div class='modal-body'>

      <!-- <form class="form-horizontal" role="form"> -->
      {!! Form::open(['class' => 'form-horizontal', 'route' => ['comments-product', $product->slug, Auth::user()]]) !!}
        <div class="form-group">
          <label class="col-sm-2 control-label" for="rating">Valoración:</label>
          <div class="col-md-10">
            <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="xs">                                
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-2 control-label" for="message">Opinión:</label>
          <div class="col-sm-10">
            {!! 
                Form::textarea(
                  'message', 
                  null, 
                  array(
                      'style' => 'resize:none',    
                      'class'=>'form-control',
                      'rows' => '5',
                      'placeholder' => 'Deja una opinión sobre este producto'
                  )
                )
            !!}            
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Enviar', array('class' => 'btn btn-group-justified btn-primary')) !!}            
          </div>
        </div>
      {!! Form::close() !!}          
      <!-- </form> -->

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default btn-close' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>