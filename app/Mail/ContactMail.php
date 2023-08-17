<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Construit l'e-mail de contact.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Demande de contact')
                    ->view('emails.contact')
                    ->with([
                        'data' => $this->data
                    ]);
    }

    /**
     * Récupère l'enveloppe du message.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Colibris Contact Mail',
        );
    }

    /**
     * Récupère la définition du contenu du message.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.Colibris.contact',
        );
    }

    /**
     * Récupère les pièces jointes du message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
