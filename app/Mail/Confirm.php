<?php

namespace App\Mail;

use App\Models\ConfirmOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Message;

class Confirm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * accessing to the view  by declaring public properties
     */
    public function __construct(public ConfirmOrder $confirmorder,)
    {
        //
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('dev.gitau@gmail.com','Gitau Isaac'),
            subject: 'Confirm Order',
        );
    }

    /**
     * Get the message header.
     */
    public function headers(): Headers
    {
        return new Headers(
            // messageId: 'custom-message-id@example.com',
            // references: ['previous-message@example.com'],
            // text: [
            //     'X-Custom-Header' => 'Custom Value',
            // ],
            //messageId: '$this->confirmorder->order_status',
            messageId: 'user@example.com',
            references: ['previous-message@example.com'],
            text: [
                'X-Custom-Header' => 'Custom Value',
            ],
        );
    }
    /**
     * Get the message content definition.using markdown
     */
    public function content(): Content
    {
        return new Content(
            markdown:'emails.confirmorder',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
