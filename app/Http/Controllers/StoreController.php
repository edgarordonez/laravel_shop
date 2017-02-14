<?php

namespace App\Http\Controllers;

use App\Products;
use App\Comments;

class StoreController extends Controller
{

    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(10);
        $cart = $this->getCart();
        return view('store.store', compact('products','cart'));
    }

    public function show($slug)
    {
        $product = Products::where('slug', $slug)->first();
        $product->opinions = Comments::where('commentable_id', $product->id)->count('rating');
        $cart = $this->getCart();
        return view('store.detail', compact('product', 'cart'));
    }

    private function getCart()
    {
        return \Session::get('cart');
    }
}