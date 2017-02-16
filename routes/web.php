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
Route::bind('product', function ($slug) {
    return App\Products::where('slug', $slug)->first();
});

Route::bind('category', function ($category) {
    return App\Category::find($category);
});

Route::bind('user', function ($user) {
    return App\User::find($user);
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
Route::name('home')->get('/', 'StoreController@index');

/*
|--------------------------------------------------------------------------
| DETAIL PRODUCT
|--------------------------------------------------------------------------
*/
Route::name('product-detail')->get('product/{product}', 'StoreController@show');

/*
|--------------------------------------------------------------------------
| COMMENTS
|--------------------------------------------------------------------------
*/
Route::name('comments-product')->post('comments/{product}/{user}', 'CommentsController@store');

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/
Route::name('cart-show')->get('cart/show', 'CartController@show');

Route::name('cart-add')->get('cart/add/{product}', 'CartController@add');

Route::name('cart-update')->post('cart/update/{product}/{quantity?}', 'CartController@update');

Route::name('cart-delete')->get('cart/delete/{product}', 'CartController@delete');

Route::name('cart-remove')->get('cart/remove', 'CartController@remove');

/*
|--------------------------------------------------------------------------
| PAYPAL
|--------------------------------------------------------------------------
*/
Route::name('payment')->get('payment', 'PaypalController@postPayment');

Route::name('payment.status')->get('payment/status', 'PaypalController@getPaymentStatus');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard')->namespace('Dashboard')->middleware('AuthDashboard')->group(function () {
    Route::name('dashboard')->get('/', function () {
        return view('dashboard.home');
    });
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
});