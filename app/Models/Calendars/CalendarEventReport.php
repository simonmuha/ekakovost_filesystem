<?php

namespace App\Models\Calendars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class CalendarEventReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_event_id',
        'calendar_event_report_start_time',
        'calendar_event_report_end_time',
        'calendar_event_report_relation',
        'calendar_event_report_transport_official',
        'calendar_event_report_transport_personal',
        'calendar_event_report_is_personal_vehicle',
        'calendar_event_report_driver_id',
        'calendar_event_report_description',
    ];

    public function calendarEvent()
    {
        return $this->belongsTo(CalendarEvent::class);
    }

    /**
     * Povezava s tabelo Person (vozniki)
     * Vsako poročilo ima voznika, ki je povezan z osebo.
     */
    public function driver()
    {
        return $this->belongsTo(Person::class, 'calendar_event_report_driver_id');
    }

    /**
     * Metoda za pridobitev trajanja poročila
     * Vrne število ur ali formatirano trajanje.
     */
    public function getDuration()
    {
        $start = \Carbon\Carbon::parse($this->calendar_event_report_start_time);
        $end = \Carbon\Carbon::parse($this->calendar_event_report_end_time);

        return $start->diffForHumans($end, true); // Prikaz formata npr. "5 hours"
    }

    /**
     * Preveri, ali je uporabljeno osebno vozilo
     */
    public function isPersonalVehicle()
    {
        return $this->calendar_event_report_is_personal_vehicle;
    }
}
