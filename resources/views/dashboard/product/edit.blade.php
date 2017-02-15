@extends('dashboard.template')

@section('content')
  <h1>
    Productos <small>[Editar producto]</small>
  </h1>
  <div class="row text-center">
    <div class="col-md-offset-3 col-md-6">
      @include('common.errors')
      <div class="well">
        {!! Form::model($product, ['route' => ['product.update', $product->slug]]) !!}
        {{ Form::hidden('_method', 'PUT') }}
            @include('dashboard.product.form')
        {!! Form::close() !!}      
      </div>
    </div>
  </div>
@endsection