<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $arItem;
    public function __construct($arItem)
    {
        $this->arItem = $arItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $arInfoMail = $this->arItem;
        $this->subject("NinhNghiaIT - Contact Successfully!");
        return $this->view('mail.contact', compact('arInfoMail'));
    }
}
