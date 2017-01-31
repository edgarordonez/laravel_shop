<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Order;
use App\OrderItem;

class PaypalController extends BaseController
{
	private $_api_context;
	private $currency = "EUR";
	private $setShipping = 5.75;
	private $subtotal = 0;

	public function __construct()
	{
		$paypal_conf = \Config::get("paypal");
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf["client_id"], $paypal_conf["secret"]));
		$this->_api_context->setConfig($paypal_conf["settings"]);
	}

	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$items = $this->createItems();

		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($this->subtotal)
						->setShipping($this->setShipping);

		$amount = new Amount();
		$total = $this->subtotal + $this->setShipping ;
		$amount->setCurrency($this->currency)
					 ->setTotal($total)
					 ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
								->setItemList($item_list)
								->setDescription("PEDIDO | ON WHEELS")
								->setInvoiceNumber(uniqid());

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route("payment.status"))
									->setCancelUrl(\URL::route("payment.status"));

		$payment = new Payment();
		$payment->setIntent("sale")
						->setPayer($payer)
						->setRedirectUrls($redirect_urls)
						->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get("app.debug")) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die("Ups! Algo salió mal");
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == "approval_url") {
				$redirect_url = $link->getHref();
				break;
			}
		}

		return (isset($redirect_url)) ? \Redirect::away($redirect_url) : \Redirect::route("cart-show")->with("error", "Ups! Error desconocido.");
	}

	public function getPaymentStatus()
	{
		if(isset($_GET["paymentId"])) {
			$payment_id = $_GET["paymentId"];
			$payment = Payment::get($payment_id, $this->_api_context);

			$payerId = \Request::get("PayerID");
			$token = \Request::get("token");
			
			if (empty($payerId) || empty($token)) {
				return \Redirect::route("cart-show")->with("message", "hubo un problema al intentar pagar con Paypal");
			}

			$execution = new PaymentExecution();
			$execution->setPayerId(\Request::get("PayerID"));

			// Execute the payment
			$result = $payment->execute($execution, $this->_api_context);

			if ($result->getState() == "approved") {
				$this->saveOrder();
				return \Redirect::route("cart-show")->with("message", "tu compra ha sido realizada de forma correcta");
			} else {
				return \Redirect::route("cart-show")->with("message", "tu compra fue cancelada! :( Esperamos verte pronto...");
			}
		} else {
				return \Redirect::route("cart-show")->with("message", "ha ocurrido un error! :( Esperamos que vuelvas pronto...");
		}
	}

	private function createItems()
	{
		$items = array();
		$cart = \Session::get("cart");

		foreach($cart as $product){
			$item = new Item();
			$item->setName($product->name)
					 ->setCurrency($this->currency)
					 ->setSku($product->slug)
					 ->setDescription($product->extract)
					 ->setQuantity($product->quantity)
					 ->setPrice($product->price);

			$items[] = $item;
			$this->subtotal += $product->quantity * $product->price;
		}
			
		return $items;
	}


	private function saveOrder()
	{
			$cart = \Session::get("cart");
	    $subtotal = 0;

	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }
	    
	    $order = Order::create([
				"subtotal" => $subtotal,
				"shipping" => $this->setShipping,
				"user_id" => \Auth::user()->id
	    ]);
	    
	    foreach($cart as $item) {
				$this->saveOrderItem($item, $order->id);
	    }

			\Session::forget("cart");
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			"quantity" => $item->quantity,
			"price" => $item->price,
			"product_id" => $item->id,
			"order_id" => $order_id
		]);
	}
}
