@extends('template')

@section('content')
    @include('common.message')
    <div class="row">
        <h1 style="padding-left: 15px;">Carrito</h1>
        <br>
        <div id="vue-cart">
            <cart :user="{{ json_encode(Auth::user()) }}" :initial-cart="{{ json_encode($cart) }}" :initial-total="{{ $total }}"></cart>
        </div>
    </div>
    <hr>
@endsection