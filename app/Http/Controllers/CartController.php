<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class CartController extends Controller
{

    public function __construct()
    {
        if(!\Session::has("cart")) {
           \Session::put("cart", array()); 
        }
    }

    public function show()
    {
        $cart = $this->getCart();
        $total = $this->totalCart()["total"];

        return view("store.cart", compact("cart", "total"));
    }

    public function add(Products $product)
    {
        $cart = $this->getCart();
        $product->quantity = 1;
        $cart[$product->slug] = $product;

        $this->updateSessionCart($cart);

        return redirect()->route("cart-show");
    }

    public function update(Request $request, Products $product, $quantity)
    {
        if($quantity <= 0) {
            $response = array(
                "status" => "400",
                "msg" => "error bad data"
            );

            return \Response::json($response);            
        }

        $cart = $this->getCart();
        $cart[$product->slug]->quantity = $quantity;
        $this->updateSessionCart($cart);
        $infoCart = $this->totalCart();
        $response = array(
            "status" => "200",
            "msg" => "setting created successfully",
            "data" => [
                "total" => $infoCart["total"],
                "itemsQuantity" => $infoCart["itemsQuantity"]
            ]
        );

        return \Response::json($response);
    }

    public function delete(Products $product)
    {
        $cart = $this->getCart();
        unset($cart[$product->slug]);
        $this->updateSessionCart($cart);

        return redirect()->route("cart-show");
    }

    public function remove() 
    {
        \Session::forget("cart");
        return redirect()->route("cart-show");
    }

    private function totalCart()
    {
        $cart = $this->getCart();
        $total = 0;
        $itemsQuantity = 0;
        foreach($cart as $product) {
            $itemsQuantity += $product->quantity;
            $total += $product->price * $product->quantity;
        }

        return [
            "total" => $total,
            "itemsQuantity" => $itemsQuantity
        ];
    }
    
    private function getCart()
    {
        return \Session::get("cart");
    }

    private function updateSessionCart($cart)
    {
        \Session::put("cart", $cart);
    }
}
