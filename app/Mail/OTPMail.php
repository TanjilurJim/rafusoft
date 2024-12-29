<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $randomNumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randomNumber)
    {
        $this->randomNumber = $randomNumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.otp')
                    ->with('randomNumber', $this->randomNumber)
                    ->attach(public_path('assets/img/logo.png'), [
                        'as' => 'logo.png',
                        'mime' => 'image/png',
                    ]);
    }
}
