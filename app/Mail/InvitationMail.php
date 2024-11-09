<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use SerializesModels;

    public $url;

    // Initialiser l'URL
    public function __construct($url)
    {
        $this->url = $url;
    }

    // Construire l'email
    public function build()
    {
        return $this->view('emails.invitation')
                    ->with(['url' => $this->url]);
    }
}
