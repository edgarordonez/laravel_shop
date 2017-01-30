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

/*
|--------------------------------------------------------------------------
| DEPENDENCY INJECTION
|--------------------------------------------------------------------------
*/
Route::bind('product', function($slug) {
  return App\Products::where('slug', $slug)->first();
});

Route::bind('category', function($category) {
  return App\Category::find($category);
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [
  'as' => 'home',
  'uses' => 'StoreController@index'
]); 

/*
|--------------------------------------------------------------------------
| DETAIL PRODUCT
|--------------------------------------------------------------------------
*/
Route::get('product/{slug}', [
  'as' => 'product-detail',
  'uses' => 'StoreController@show'
]);

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/
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

/*
|--------------------------------------------------------------------------
| PAYPAL
|--------------------------------------------------------------------------
*/
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('dashboard', function() {
  return view('dashboard.home');
})->name('dashboard');

Route::resource('dashboard/category', 'Dashboard\CategoryController');  
Route::resource('dashboard/product', 'Dashboard\ProductController');  


/*
Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard'], function() {
  


});
*/