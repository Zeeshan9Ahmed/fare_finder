<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordOTPMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($user,$otp)
   {
       $this->user = $user;
       $this->otp = $otp;
   }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forgot_password_otp')->with(['otp'=>$this->otp,'user'=>$this->user]);
    }
}
