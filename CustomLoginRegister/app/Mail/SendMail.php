<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    private  $testMailData;
    /**
     * Create a new message instance.
     */
    public function __construct($testMailData)
    {
        $this->testMailData = $testMailData;
    }
    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Email From Profilics')
            ->view('emails.testMail', ['testMailData' =>  $this->testMailData]);
    }
}
