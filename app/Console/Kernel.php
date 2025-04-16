<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Jobs\SendDailyEmail;

use App\Models\App\AppDay;
use App\Models\App\AppEmail;
use App\Models\App\AppEmailSchedule;
use App\Models\Person;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
            $currentTime = now()->format('H:i');
            $currentDayName = now()->format('l'); // Vrne ime dneva v angleščini (Monday, Tuesday, ...)
        
            Log::info("Pošiljanje opomnikov uporabnikom ob {$currentTime}");
        
            // Pridobimo ID za današnji dan
            $currentDay = AppDay::where('app_day_name_eng', $currentDayName)->first();
        
            if (!$currentDay) {
                Log::warning("Današnji dan ni najden v tabeli app_days: {$currentDayName}");
                return;
            }
        
            // Pridobimo vse urnike za trenutni dan in uro
            $emailSchedules = AppEmailSchedule::where('app_email_schedule_is_active', true)
                ->where('app_day_id', $currentDay->id)
                ->where('app_email_schedule_time', 'LIKE', $currentTime . '%') // Primerjava brez sekund
                ->with(['appEmail', 'appDay', 'organization.people']) // Dodajamo 'organization' v preload
                ->get();


                

            if ($emailSchedules->isEmpty()) {
                Log::info("Ni urnikov za pošiljanje e-pošte za dan {$currentDayName} in uro {$currentTime}.");
                return;
            }
        
            foreach ($emailSchedules as $emailSchedule) {
                // Pridobimo dnevni opomnik samo, če je potreben
                if ($emailSchedule->appEmail->app_email_code === 'daily_reminder') {
        
                    if ($emailSchedule->organization && isset($emailSchedule->organization->people)) {
                        foreach ($emailSchedule->organization->people as $app_organization_person) {
                            // Log pošiljanja
                            Log::info("Pošiljanje dnevnega napovednika (Kernel) uporabniku: " . $app_organization_person->person_name);
        
                            // Pošiljanje e-pošte
                            dispatch(new SendDailyEmail($app_organization_person));
                        }
                    } else {
                        Log::warning("E-poštni urnik nima povezanih uporabnikov v organizaciji.");
                    }
                }
        
                // Tukaj lahko kasneje dodaš še logiko za tedenski opomnik ali druge tipe emailov.
            }
        })->everyMinute();
        
        
        


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
