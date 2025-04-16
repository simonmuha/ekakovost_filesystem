<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use App\Models\App\LoginLog;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Login $event)  // Spremenite tip argumenta
    {
        $user = $event->user; // Pridobi prijavljenega uporabnika

        // Ustvari nov zapis v tabeli login_logs
        LoginLog::create([
            'user_id' => $user->id,
            'ip_address' => request()->ip(), // Pridobi IP naslov uporabnika
            'logged_in_at' => now(),
        ]);
    }
}
