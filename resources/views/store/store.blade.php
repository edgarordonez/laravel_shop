@extends('template')

@section('content')
    @include('store.partials.slider')

    <div class="row">
        <div class="col-lg-12">
            <h3>Nuestros productos</h3>
        </div>
    </div>

    <div class="row text-center">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="{{ route('product-detail', $product->slug) }}">
                        <img src="{{ $product->image }}">
                    </a>
                    <div class="caption">
                        <h3>{{ str_limit($product->name, $limit = 25, $end = '...') }}</h3>
                        <p>{{ str_limit($product->extract, $limit = 60, $end = '...') }}</p>
                        <p>Precio: {{ money_format('%.2n', $product->price) }}€</p>
                        <p>
                            <a href="{{ route('cart-add', $product->slug) }}" class="btn btn-primary">Comprar</a>
                            <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-default">Leer más</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="col-md-12 text-center">
        {!! $products->render() !!}
    </div>
@endsection