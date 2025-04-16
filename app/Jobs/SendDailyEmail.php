<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use App\Mail\DailyEmail;
use Illuminate\Support\Facades\Mail;

class SendDailyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $person;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($person)
    {
        $this->person = $person;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() 
    {
        //
        $person = $this->person;
        Log::info('Podatki o osebi v SendDailyEmail:', ['person' => $person->person_name]);
        $today = now()->toDateString();
        // Začetek in konec tedna (ponedeljek - nedelja)
        $startOfWeek = now()->startOfWeek()->toDateString(); // Ponedeljek
        $endOfWeek = now()->endOfWeek()->toDateString(); // Nedelja

        // Dnevni dogodki (samo današnji dan)

        $person_daily_events = \App\Models\Calendars\CalendarEvent::whereDate('calendar_event_start_time', $today)
            ->where('person_id', $person->id)   
            ->get();

        $daily_events = \App\Models\Calendars\CalendarEvent::whereDate('calendar_event_start_time', $today)
        ->get();
        
        // Tedenski dogodki (od ponedeljka do nedelje)
        $person_weekly_events = \App\Models\Calendars\CalendarEvent::whereBetween('calendar_event_start_time', [$startOfWeek, $endOfWeek])
            ->where('person_id', $person->id)   
            ->get();
        
        $data = [ 
            'title' => 'Denvni napovednik:',
            'person' => $person,
            'message' => 'Opomnik za vaše današnje dogodke:',
            'person_daily_events' => $person_daily_events,
            'daily_events' => $daily_events,
            'person_weekly_events' => $person_weekly_events,
        ];

        try {
            
            Mail::to($person->person_email)->send(new DailyEmail($data));

            // Pridobimo status "Poslano"
            $sentStatus = \App\Models\Emails\EmailStatus::where('email_status_name_eng', 'Sent')->first();

            // Vstavimo podatek v emails tabelo
            \App\Models\Emails\Email::create([
                'app_email_id' => \App\Models\App\AppEmail::where('app_email_code', 'daily_reminder')->value('id'),
                'email_recipient_id' => $person->id,
                'email_sender_id' => null, // Sistem pošilja e-pošto
                'email_subject' => $data['title'],
                'email_body' => view('school.emails.daily', $data)->render(),
                'email_attachments' => json_encode([]), // Ni priponk
                'email_status_id' => $sentStatus->id ?? null,
                'email_sent_at' => now(),
                'email_valid_until' => now()->addDays(30), // Npr. hramba 30 dni
            ]);

        } catch (\Exception $e) {
            Log::error("Neuspešno pošiljanje e-pošte: " . $e->getMessage());

            // Pridobimo status "Neuspešno"
            $failedStatus = \App\Models\Emails\EmailStatus::where('email_status_name_eng', 'Failed')->first();

            // Vstavimo zapis tudi ob neuspehu
            \App\Models\Emails\Email::create([
                'app_email_id' => \App\Models\App\AppEmail::where('app_email_code', 'daily_reminder')->value('id'),
                'email_recipient_id' => $person->id,
                'email_sender_id' => null,
                'email_subject' => $data['title'],
                'email_body' => view('school.emails.daily', $data)->render(),
                'email_attachments' => json_encode([]),
                'email_status_id' => $failedStatus->id ?? null,
                'email_sent_at' => null, // Ker ni bilo poslano
                'email_valid_until' => now()->addDays(30),
                'email_error_message' => $e->getMessage(),
            ]);
        }
    }
}
