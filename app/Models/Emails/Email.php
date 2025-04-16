<?php

namespace App\Models\Emails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\App\AppEmail;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_email_id',
        'email_recipient_id',
        'email_sender_id',
        'email_subject',
        'email_body',
        'email_attachments',
        'email_status_id',
        'email_sent_at',
        'email_valid_until',
    ];

    protected $casts = [
        'email_attachments' => 'array',
        'email_sent_at' => 'datetime',
        'email_valid_until' => 'datetime',
    ];

    public function app_email()
    {
        return $this->belongsTo(AppEmail::class, 'app_email_id');
    }

    // Povezava na prejemnika
    public function recipient()
    {
        return $this->belongsTo(Person::class, 'email_recipient_id');
    }

    // Povezava na pošiljatelja (lahko NULL, če sistemski proces)
    public function sender()
    {
        return $this->belongsTo(Person::class, 'email_sender_id');
    }

    // Povezava na status
    public function status()
    {
        return $this->belongsTo(EmailStatus::class, 'email_status_id');
    }
}
