<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Utilisateur};

class CreateUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Utilisateur $user, $message)
    {
        $this->user = $user;
        $this->message = $message;
        $this->subject("Time Manager - Création de compte");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.create');
    }
}
