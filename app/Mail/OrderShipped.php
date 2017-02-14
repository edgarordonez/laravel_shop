<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pathPdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->pathPdf = $pathPdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderShipped')
                    ->subject('OrderShipped')
                    ->attach($this->pathPdf, [
                        'as' => 'factura.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
