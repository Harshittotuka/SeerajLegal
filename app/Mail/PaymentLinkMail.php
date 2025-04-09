<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentLinkMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $paymentLink;

    public function __construct($name, $paymentLink)
    {
        $this->name = $name;
        $this->paymentLink = $paymentLink;
    }

    public function build()
    {
        return $this->subject('Complete Your Membership Payment')
                    ->markdown('emails.payment-link');
    }
}
