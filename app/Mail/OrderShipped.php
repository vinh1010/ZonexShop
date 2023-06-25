<?php

namespace App\Mail;

use App\Helper\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cart = new Cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('zonexshop8888@gmail.com')->view('mail.order');
    }
}
