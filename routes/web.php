<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Auth::routes();
Route::get('home', 'HomeController@index');

// Home
Route::get('/', [
  'as' => 'home',
  'uses' => 'StoreController@index'
]); 

// Detail product
Route::get('product/{slug}', [
  'as' => 'product-detail',
  'uses' => 'StoreController@show'
]);

// Cart
Route::bind('product', function($slug) {
  return App\Products::where('slug', $slug)->first();
});

Route::get('cart/show', [
  'as' => 'cart-show',
  'uses' => 'CartController@show'
]);

Route::get('cart/add/{product}', [
  'as' => 'cart-add',
  'uses' => 'CartController@add'
]);

Route::post('cart/update/{product}/{quantity?}', [
  'as' => 'cart-update',
  'uses' => 'CartController@update'
]);

Route::get('cart/delete/{product}', [
  'as' => 'cart-delete',
  'uses' => 'CartController@delete'
]);

Route::get('cart/remove', [
  'as' => 'cart-remove',
  'uses' => 'CartController@remove'
]);


