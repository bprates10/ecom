<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BuyMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $infos;

    public function __construct($data)
    {
        $this->infos = $data;
    }

    public function build()
    {
        return $this->from('to@email.com')
            ->view('emails.sendMail')
            ->subject('Compra realizada')
            ->with([
                'infos' => $this->infos,
            ]);
    }
}
