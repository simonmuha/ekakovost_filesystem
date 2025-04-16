<?php
    $schedule->call(function () {
        Log::info('Pošiljanje e-pošte uporabniku C ob ' . now());

        $person = \App\Models\Person::where('person_email', 'simon.muha@scv.si')->first();
        Log::info('Pošiljanje e-pošte (Kernel) uporabniku  ' . $person->person_name);
        if ($person) {
            dispatch(new SendDailyEmail($person));
        }
    })->everyFiveMinutes();


    Log::info('Pošiljanje e-pošte uporabniku C ob ' . now());
    
    $person = \App\Models\Person::where('person_email', 'simon.muha@scv.si')->first();
    if ($person) {
        Log::info('Pošiljanje e-pošte (Kernel) uporabniku  ' . $person->person_name);
        dispatch(new SendDailyEmail($person));
    } else {
        Log::warning('Uporabnik z e-pošto simon.muha@scv.si ni najden v bazi.');
    }
    
$emailSchedules = AppEmailSchedule::where('app_email_schedule_is_active', true)
        ->where('app_day_id', $currentDay->id)
        ->where('app_email_id', $dailyReminder->id)
        ->with(['appEmail', 'appDay', 'appEmail.people'])
        ->get();

foreach ($emailSchedules as $emailSchedule) {
        // Nastavimo čas pošiljanja
        $sendTime = $emailSchedule->app_email_schedule_time ?? '07:00';

        $schedule->call(function () use ($emailSchedule) {
            Log::info('Pošiljanje e-pošte za urnik ID: ' . $emailSchedule->id . ' ob ' . now());

            $recipients = $emailSchedule->appEmail->people;

            if ($recipients->isEmpty()) {
                Log::info('Ni uporabnikov za pošiljanje e-pošte za urnik ID: ' . $emailSchedule->id);
                return;
            }

            foreach ($recipients as $person) {
                dispatch(new SendDailyEmail($person));
                Log::info("E-pošta poslana: " . $person->person_email);
            }
        })->dailyAt($sendTime);

        $schedule->call(function () {
            // Logiranje začetka izvajanja
            Log::info('Preverjanje uporabnikov za dnevni opomnik ob ' . now());
    
            // Poiščemo zapis v `app_emails`, ki ima kodo 'daily_reminder'
            
    
            // Pridobimo vse osebe, povezane s tem e-poštnim opomnikom
            $recipients = $dailyReminder->people;
    
            if ($recipients->isEmpty()) {
                Log::info('Ni uporabnikov za pošiljanje dnevnega opomnika.');
                return;
            }
    
            // Pošljemo e-pošto vsaki osebi posebej
            foreach ($recipients as $person) {
                dispatch(new \App\Jobs\SendDailyEmail($person));
                Log::info("E-pošta poslana: " . $person->email);
            }
        })->everyFiveMinutes();
        
        
    }


    ->everyMinute();