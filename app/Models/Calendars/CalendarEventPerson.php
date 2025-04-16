<?php

namespace App\Models\Calendars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\Calendars\CalendarEvent;
use App\Models\Calendars\CalendarEventPersonRole;

class CalendarEventPerson extends Model
{
    use HasFactory;
    protected $table = 'calendar_event_people'; // Ime pivot tabele

    protected $fillable = [
        'calendar_event_id',
        'person_id',
        'calendar_event_person_role_id',
    ];

    /**
     * Povezava z modelom `CalendarEvent`.
     */
     
    public function calendarEventPersonRole()
    {
        return $this->belongsTo(CalendarEventPersonRole::class, 'calendar_event_person_role_id');
    }
     public function calendarEvent()
    {
        return $this->belongsTo(CalendarEvent::class, 'calendar_event_id');
    }

    /**
     * Povezava z modelom `Person`.
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * Povezava z modelom `CalendarEventPersonRole`.
     */
    public function role()
    {
        return $this->belongsTo(CalendarEventPersonRole::class, 'calendar_event_person_role_id');
    }
}
