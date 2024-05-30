<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendQuotationEmail extends Mailable

{
    use Queueable, SerializesModels;

    public $quotationData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quotationData)
    {
        $this->quotationData = $quotationData; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail');
    }
}