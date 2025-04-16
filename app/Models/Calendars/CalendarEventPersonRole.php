<?php

namespace App\Models\Calendars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Calendars\CalendarEventPerson;

class CalendarEventPersonRole extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'calendar_event_person_roles'; // Ime tabele

    protected $fillable = [
        'calendar_event_person_role_name', 
        'calendar_event_person_role_name_eng', 
    ];

    /**
     * Povezava z modelom `CalendarEventPerson`.
     */
    public function calendarEventPeople()
    {
        return $this->hasMany(CalendarEventPerson::class, 'calendar_event_person_role_id');
    }
}
