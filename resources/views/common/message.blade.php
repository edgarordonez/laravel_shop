  @if(\Session::get('message'))
  <div class="alert alert-info">
    <strong>¡Hola {{ Auth::user()->name  }}!</strong> {{ \Session::get('message') }}
  </div>
  @endif 