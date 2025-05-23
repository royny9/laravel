<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class StatMail extends Mailable
{
    use Queueable, SerializesModels;

    /*
     * Create a new message instance.
     */
    public function __construct(public $article_count, public $comment_count)
    {
        //
    }

    /*
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            from: new Address("royny3.0@mail.ru", env("MAIL_FROM_NAME")),

            subject: 'Stat Mail',
        );
    }

    /*
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.stat',
            with:[
                'article_count'=>$this->article_count,
                'comment_count'=>$this->comment_count,
            ]
        );
    }

    /*
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}