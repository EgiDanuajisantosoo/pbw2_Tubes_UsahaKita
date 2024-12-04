<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class EmailVerification extends Mailable
{
    public $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        return $this->subject('Verifikasi Email Baru Anda')
            ->view('form.codeVerif');
            
    }
}
