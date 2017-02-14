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

Route::bind('user', function($user) {
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
| COMMENTS
|--------------------------------------------------------------------------
*/
Route::post('comments/{product}/{user}', [
  'as' => 'comments-product',
  'uses' => 'CommentsController@store'
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
Route::group(['namespace' => 'Dashboard', 'middleware' => ['AuthDashboard'], 'prefix' => 'dashboard'], function() {
  Route::get('/', function() {
    return view('dashboard.home');
  })->name('dashboard');

  Route::resource('category', 'CategoryController');  
  Route::resource('product', 'ProductController');
  Route::resource('user', 'UserController');
  Route::resource('order', 'OrderController');
});

Route::get('email/pdf', function() {
  $date = new DateTime();
  $order = App\Order::orderBy('id','desc')->first();
  $orderItems = App\OrderItem::where('order_id', $order->id)->orderBy('id','desc')->get();
  $user = \Auth::user();
  $pathPdf = "storage/pdf/factura-" . $date->format('Y-m-d-H-m-s') . ".pdf";

  return view('emails.pdf', compact('user', 'order', 'orderItems'));
});