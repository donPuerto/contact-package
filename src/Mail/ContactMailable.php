<?php

namespace Donpuerto\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
  use Queueable, SerializesModels;

  public $message;
  public $name;

  public function __construct($message, $name)
  {
    $this->message = $message;
    $this->name = $name;
  }

  public function build()
  {
    return $this->markdown('contact::contact.email')->with([
      'message' => $this->message,
      'name' => $this->name
    ]);
  }
}