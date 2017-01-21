<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class CartController extends Controller
{

    public function __construct()
    {
        if(!\Session::has('cart')) {
           \Session::put('cart', array()); 
        }
    }

    public function show()
    {
        $cart = \Session::get('cart');
        $total = $this->totalCart();
        return view('store.cart', compact('cart', 'total'));
    }

    public function add(Products $product)
    {
        $cart = \Session::get('cart');
        $product->quantity = 1;
        $cart[$product->slug] = $product;

        $this->updateSessionCart($cart);

        return redirect()->route('cart-show');
    }

    public function delete(Products $product)
    {
        $cart = \Session::get('cart');
        unset($cart[$product->slug]);
        $this->updateSessionCart($cart);

        return redirect()->route('cart-show');
    }

    private function totalCart()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $product) {
            $total += $product->price * $product->quantity;
        }

        return $total;
    }

    private function updateSessionCart($cart)
    {
        \Session::put('cart', $cart);
    }

}
