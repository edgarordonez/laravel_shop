<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;

use App\Products;
use App\Category;

class ProductController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        
        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * @param SaveProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveProductRequest $request)
    {
        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            'image'         => $request->get('image'),
            'visible'       => $request->has('visible') ? 1 : 0,
            'category_id'   => $request->get('category_id')
        ];

        $product = Products::create($data);
        $message = $product ? 'el producto ha sido agregado correctamente.' : 'el producto no pudo agregarse.';
        
        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * @param Products $product
     * @return Products
     */
    public function show(Products $product)
    {
        return $product;
    }

    /**
     * @param Products $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Products $product)
    {
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        return view('dashboard.product.edit', compact('categories', 'product'));
    }

    /**
     * @param SaveProductRequest $request
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveProductRequest $request, Products $product)
    {
        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;
        
        $updated = $product->save();
        $message = $updated ? 'el producto ha sido actualizado.' : 'el producto no pudo actualizarse.';
        
        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Products $product)
    {
        $deleted = $product->delete();
        $message = $deleted ? 'producto eliminado correctamente.' : 'el producto no pudo eliminarse.';

        return redirect()->route('product.index')->with('message', $message);
    }
}