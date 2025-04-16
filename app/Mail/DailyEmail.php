<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DailyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Podatki za e-pošto

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data; // Shranimo podatke za uporabo v pogledu
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: (($this->data['person']->organization->app_organization_name_short ?? '') ? 
                $this->data['person']->organization->app_organization_name_short . ' - ' : '') . 
                'Dnevni napovednik',

        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        Log::info('Podatki o pošiljanju v DailyEmail:');
        return new Content(  
            view: 'school.emails.daily',
            with: [
                'title' => $this->data['title'] ?? 'Pozdravljeni',
                'person' => $this->data['person'] ?? [],
                'message' => $this->data['message'] ?? 'To je privzeto sporočilo.',
                'person_daily_events' => $this->data['person_daily_events'] ?? [], // Dodamo dogodke
                'daily_events' => $this->data['daily_events'] ?? [], // Dodamo dogodke
                'person_weekly_events' => $this->data['person_weekly_events'] ?? [], // Dodamo dogodke
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
       
        return [];
    }
}
