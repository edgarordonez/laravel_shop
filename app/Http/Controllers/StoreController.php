<?php

namespace App\Http\Controllers;

use App\Products;
use App\Comments;

class StoreController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(10);
        $cart = $this->getCart();
        return view('store.store', compact('products','cart'));
    }

    /**
     * @param Products $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $slug
     */
    public function show(Products $product)
    {
        $product->opinions = Comments::where('commentable_id', $product->id)->count('rating');
        $cart = $this->getCart();
        return view('store.detail', compact('product', 'cart'));
    }

    /**
     * @return mixed
     */
    private function getCart()
    {
        return \Session::get('cart');
    }
}