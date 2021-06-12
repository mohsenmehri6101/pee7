<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainMail extends Mailable
{
    use Queueable, SerializesModels;

    public $textMessage;

    public function __construct($textMessage)
    {
        $this->textMessage=$textMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message=$this->textMessage;
        return $this->markdown('emails.mail',compact('message'));
    }
}
