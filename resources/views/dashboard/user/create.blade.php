@extends('dashboard.template')

@section('content')
    <h1>
        Usuarios
        <small>[Agregar usuario]</small>
    </h1>
    <div class="row text-center">
        <div class="col-md-offset-3 col-md-6">
            @include('common.errors')
            <div class="well">
                {!! Form::open(['route'=>'user.store']) !!}
                @include('dashboard.user.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection