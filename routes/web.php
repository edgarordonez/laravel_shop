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
Route::prefix('cart')->group(function () {
    Route::name('cart-show')->get('/', 'CartController@show');

    Route::name('cart-add')->get('add/{product}', 'CartController@add');

    Route::name('cart-update')->post('update/{product}/{quantity?}', 'CartController@update');

    Route::name('cart-delete')->post('delete/{product}', 'CartController@delete');

    Route::name('cart-remove')->get('remove', 'CartController@remove');
});

/*
|--------------------------------------------------------------------------
| PAYPAL
|--------------------------------------------------------------------------
*/
Route::prefix('payment')->group( function () {
    Route::name('payment')->get('/', 'PaypalController@postPayment');
    Route::name('payment.status')->get('status', 'PaypalController@getPaymentStatus');
});

/*
|--------------------------------------------------------------------------
| CHAT
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::name('chat')->get('chat', 'ChatController@index');

    Route::name('messages')->get('messages/{room}', 'ChatController@show');

    Route::name('messages')->post('messages/{room}', 'ChatController@create');
});

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

    Route::name('chat')->get('chat', 'ChatController@index');

    Route::name('chat-user')->get('chat/{room}', 'ChatController@room');
});