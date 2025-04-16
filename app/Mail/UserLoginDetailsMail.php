<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserLoginDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;
    public $user;  
    public $password;  // Nova javna lastnost za geslo

    /**
     * Create a new message instance.
     *
     * @param string $pdfPath
     * @param \App\Models\User $user
     * @param string $password
     * @return void
     */
    public function __construct($pdfPath, $user, $password)
    {
        $this->pdfPath = $pdfPath;
        $this->user = $user;
        $this->password = $password;  // Shranjevanje gesla
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Kakovost ERŠ - Podatki za prijavo')
                    ->view('organization_admin.mails.user_login')
                    ->with([
                        'user' => $this->user,
                        'password' => $this->password,  // Pošiljanje gesla v predlogo
                    ]);
        // Če želite priložiti PDF:
        // ->attach($this->pdfPath, [
        //     'as' => 'PrijavniPodatki.pdf',
        //     'mime' => 'application/pdf',
        // ]);
    }
}
