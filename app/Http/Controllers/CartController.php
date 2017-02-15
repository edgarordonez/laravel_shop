<?php

namespace App\Http\Controllers;

use Response;
use Session;

use App\Products;

class CartController extends Controller
{
    /**
     * CartController constructor.
     */
    public function __construct()
    {
        if(!Session::has('cart')) {
           Session::put('cart', array());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $cart = $this->getCart();
        $currentTotalCart = $this->getCurrentStateCart()['total'];
        return view('store.cart', compact('cart', 'currentTotalCart'));
    }

    /**
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Products $product)
    {
        $cart = $this->getCart();
        $product->quantity = 1;
        $cart[$product->slug] = $product;

        $this->updateSessionCart($cart);

        return redirect()->route('cart-show');
    }

    /**
     * @param Products $product
     * @param $quantity
     * @return mixed
     */
    public function update(Products $product, $quantity)
    {
        if($quantity <= 0) {
            $response = array(
                'status' => '400',
                'msg' => 'error bad data'
            );

            return Response::json($response);
        }

        $cart = $this->getCart();
        $cart[$product->slug]->quantity = $quantity;
        $this->updateSessionCart($cart);
        $currentStatusCart = $this->getCurrentStateCart();
        $response = [
            'status' => '200',
            'msg' => 'setting created successfully',
            'data' => [
                'total' => $currentStatusCart['total'],
                'itemsQuantity' => $currentStatusCart['itemsQuantity']
            ]
        ];

        return Response::json($response);
    }

    /**
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Products $product)
    {
        $cart = $this->getCart();
        unset($cart[$product->slug]);
        $this->updateSessionCart($cart);

        return redirect()->route('cart-show');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        Session::forget('cart');
        return redirect()->route('cart-show');
    }

    /**
     * @return mixed
     */
    private function getCart()
    {
        return Session::get('cart');
    }

    /**
     * @param $cart
     */
    private function updateSessionCart($cart)
    {
        Session::put('cart', $cart);
    }

    private function getCurrentStateCart()
    {
        $cart = $this->getCart();
        return collect($cart)->reduce(function ($currentStateCart, $product)
        {
            $currentStateCart['total'] += $product->price * $product->quantity;
            $currentStateCart['itemsQuantity'] += $product->quantity;
            return $currentStateCart;
        }, ['total' => 0, 'itemsQuantity' => 0]);
    }
}