<div class="modal fade" id="modal_{{ $order->id }}" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle del Pedido: </h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">

          <table class="table table-stripped table-bordered table-hover">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($order->order_items as $order_item)
                  <td>
                    <img src="{{ $order_item->product->image }}" alt="{{ $order_item->product->name }}" width='150' />
                  </td>
                  <td>{{ $order_item->product->name }}</td>
                  <td>{{ $order_item->product->price }}</td>
                  <td>{{ $order_item->quantity }}</td>
                  <td>{{ $order_item->price }}</td>        
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>