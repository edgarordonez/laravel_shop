<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class StoreController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('store.store', compact('products'));
    }

    public function show($slug)
    {
        $product = Products::where('slug', $slug)->first();
        return view('store.detail', compact('product'));
    }    
}
