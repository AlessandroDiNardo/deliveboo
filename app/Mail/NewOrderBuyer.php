<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderBuyer extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    
    public function __construct($order)
    {
        $this -> order = $order;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Order N°' . $this -> order -> code,
            replyTo: env('MAIL_FROM_ADDRESS', 'hello@example.com')
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.new-order-buyer',
        );
    }
}