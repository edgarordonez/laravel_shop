@extends('template')

@section('content')
<div class="row">

    <div class="col-md-6">
                <img class="img-responsive" src="{{ $product->image }}">
    </div>
    <div class="col-md-6">

        <div class="thumbnail">

            <div class="caption-full">
                <h4 class="pull-right">{{ money_format('%.2n', $product->price) }}€</h4>
                <h4><a href="#">{{ $product->name }}</a>
                </h4>
                <p>{{ $product->description }}</p>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-12">
                        <div class="col-xs-12 col-md-12">
                            <a href="{{ route('cart-add', $product->slug) }}" class="btn btn-success btn-block">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ratings">
                <p class="pull-right">3 reviews</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    4.0 stars
                </p>
            </div>
        </div>

        <div class="well">

            <div class="text-right">
                <a class="btn btn-default btn-modal" data-toggle='modal' data-target="#comment">Opinar sobre este producto</a>
            </div>
            @include('store.modalForm')
            <hr>
            @foreach($product->comments as $coment)
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    {{ $coment->user->name }}
                    <span class="pull-right">{{ Date::parse($coment->created_at)->diffForHumans() }}</span>
                    <p>{{ $coment->message }}</p>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

<hr>
@endsection