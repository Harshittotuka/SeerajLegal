<?php

namespace App\Mail;

use App\Models\Intern;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentPendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $intern;
    public $paymentUrl;

    public function __construct(Intern $intern, string $paymentUrl)
    {
        $this->intern = $intern;
        $this->paymentUrl = $paymentUrl;
    }

    public function build()
    {
        return $this->subject('Complete your membership payment')
                    ->markdown('emails.interns.payment_pending');
    }
}
