@extends('template')

@section('content')
    @include('common.message')
    @include('common.errors')
    <div class="row detail">
        <div class="col-md-6">
            <img class="img-responsive" src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <div class="thumbnail">
                <div class="caption-full">
                    <div class="col-md-12">
                        <h4 class="pull-left"><a href="#">{{ $product->name }}</a></h4>
                        <h4 class="pull-right">{{ money_format('%.2n', $product->price) }}€</h4>
                    </div>

                    <div class="col-md-12">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-md-12">
                                <div class="ratings pull-right">
                                    <input style="display: inline-block;" class="rating rating-loading ratingProduct"
                                           value="{{ $product->rating }}" data-size="xs">
                                    <small>{{ $product->opinions }} opiniones</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-md-12">
                                <a href="{{ route('cart-add', $product->slug) }}" class="btn btn-success btn-block">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="text-right">
                    <a class="btn btn-default btn-modal" data-toggle='modal' data-target="#comment">Opinar sobre este
                        producto</a>
                </div>
                <hr>
                @foreach($product->comments() as $coment)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ratings">
                                <p>
                                    <input style="display: inline-block;" class="rating rating-loading ratingProduct"
                                           value="{{ $coment->rating }}" data-size="xs">
                                    {{ $coment->rating }} estrellas
                                </p>
                            </div>
                            {{ $coment->user->name }}
                            <span class="pull-right">{{ Date::parse($coment->created_at)->diffForHumans() }}</span>
                            <p>{{ $coment->message }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! $product->comments()->render() !!}
                    </div>
                </div>
                @include('store.modalForm')
            </div>
        </div>
    </div>

    <hr>
@endsection