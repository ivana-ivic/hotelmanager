<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

// use App\Stay;
// use App\Guest;
// use App\Bill;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill, $subject)
    {
        $this->bill = $bill;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.bill');
    }
}
