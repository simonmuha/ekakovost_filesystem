<?php

namespace App\Notifications; 

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)  // Sprejemanje parametra $token
    {
        $this->token = $token;  // Shranjevanje v lastnost
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Vaše novo geslo')
        ->line('Kliknite spodnji gumb za ponastavitev gesla.')
        ->action('Ponastavi geslo', url(route('password.reset', ['token' => $this->token], false)))
        ->line('Če niste zahtevali ponastavitve, ignorirajte to e-pošto.')
        ->line('Če imate težave pri klikanju na gumb "Ponastavi geslo", kopirajte in prilepite to povezavo v vaš spletni brskalnik:')
        ->line(url(route('password.reset', ['token' => $this->token], false)))
        ->line('© 2025 eKakovost - Pot do odličnosti. Vse pravice pridržane.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
