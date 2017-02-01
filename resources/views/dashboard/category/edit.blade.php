@extends('dashboard.template')

@section('content')
  <h1>
    Categorías <small>[Editar categoría]</small>
  </h1>
  <div class="row text-center">
    <div class="col-md-offset-3 col-md-6">
      @include('dashboard.partials.errors')
      <div class="well">
        {!! Form::model($category, ['route' => ['category.update', $category]]) !!}
        {{ Form::hidden('_method', 'PUT') }}
            @include('dashboard.category.form')
        {!! Form::close() !!}        
      </div>
    </div>
  </div>
@endsection