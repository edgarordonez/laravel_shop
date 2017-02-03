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
          <label  class="col-sm-2 control-label" for="comment">Valoración:</label>
          <div class="col-md-10">
            <label class="radio-inline"><input type="radio" name="puntuation" value="1">1 <i class="fa fa-star" aria-hidden="true"></i></label>
            <label class="radio-inline"><input type="radio" name="puntuation" value="2">2 <i class="fa fa-star" aria-hidden="true"></i></label>
            <label class="radio-inline"><input type="radio" name="puntuation" value="3">3 <i class="fa fa-star" aria-hidden="true"></i></label>
            <label class="radio-inline"><input type="radio" name="puntuation" value="4">4 <i class="fa fa-star" aria-hidden="true"></i></label>          
            <label class="radio-inline"><input type="radio" name="puntuation" value="5">5 <i class="fa fa-star" aria-hidden="true"></i></label>                                
          </div>
        </div>

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