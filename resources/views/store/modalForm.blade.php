<div class='modal fade' id="comment" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Escribe tu opinión: </h4>
      </div>
      <div class='modal-body'>

      <form class="form-horizontal" role="form">

        <div class="form-group">
          <label  class="col-sm-2 control-label" for="input-1">Valoración:</label>
          <div class="col-md-10">
            <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="xs">                                
          </div>
        </div>-

        <div class="form-group">
          <label  class="col-sm-2 control-label" for="comment">Opinión:</label>
          <div class="col-sm-10">
            <textarea style="resize:none" class="form-control" rows="5" id="comment" placeholder="Deja una opinión sobre este producto"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-group-justified btn-primary">Enviar</button>
          </div>
        </div>
      </form>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default btn-close' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>