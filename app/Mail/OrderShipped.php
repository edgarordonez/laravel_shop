<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Order;
use App\OrderItem;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pathForPDF;

    public function __construct(User $user)
    {
        $this->user = $user;
        $date = new \DateTime();
        $order = Order::orderBy('id', 'desc')->first();
        $orderItems = OrderItem::where('order_id', $order->id)->orderBy('id', 'desc')->get();

        $pdf = \PDF::loadView('emails.pdf', compact('user', 'order', 'orderItems'));
        $this->pathForPDF = 'facturas/factura-' . $date->format('Y-m-d-H:i:s') . '.pdf';

        \Storage::put($this->pathForPDF, $pdf->output());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = \Storage::get($this->pathForPDF);
        return $this->view('emails.orderShipped')
            ->subject('OrderShipped')
            ->attachData($pdf, 'factura', [
                'mime' => 'application/pdf',
            ]);
    }
}
