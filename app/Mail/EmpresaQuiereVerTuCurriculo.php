<?php

namespace App\Mail;

use App\Models\Curriculo;
use App\Models\Empresa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmpresaQuiereVerTuCurriculo extends Mailable
{
    use Queueable, SerializesModels;

    public $empresa, $curriculo ;

    /**
     * Create a new message instance.
     */
    public function __construct(Empresa $empresa, Curriculo $curriculo)
    {
        $this->empresa = $empresa;
        $this->curriculo = $curriculo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Marca Personal F.P.: Una empresa quiere ver tu currículum',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.empresas.empresaQuiereVerTuCurriculo',
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
