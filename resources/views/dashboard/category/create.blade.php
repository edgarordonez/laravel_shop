@extends('dashboard.template')

@section('content')
    <h1>
        Categorías
        <small>[Agregar categoría]</small>
    </h1>
    <div class="row text-center">
        <div class="col-md-offset-3 col-md-6">
            @include('common.errors')
            <div class="well">
                {!! Form::open(['route'=>'category.store']) !!}
                @include('dashboard.category.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection