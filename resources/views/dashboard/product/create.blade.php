@extends('dashboard.template')

@section('content')
    <h1>
        Productos
        <small>[Agregar producto]</small>
    </h1>
    <div class="row text-center">
        <div class="col-md-offset-3 col-md-6">
            @include('common.errors')
            <div class="well">
                {!! Form::open(['route'=>'product.store']) !!}
                @include('dashboard.product.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection