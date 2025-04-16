<?php

namespace App\Models\Calendars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

use App\Models\Projects\Project;

class CalendarEvent extends Model
{
    use HasFactory;
    protected $table = 'calendar_events'; // Ime tabele

    protected $fillable = [
        'calendar_event_title',        // Polja iz tabele calendar_events
        'calendar_event_description',
        'calendar_event_description_short',
        'calendar_event_start_time',
        'calendar_event_end_time',
        'calendar_event_type_id',
        'calendar_event_ownership_id',
        'calendar_event_parent_id',
        'calendar_event_all_day',
        // Dodajte druga polja tukaj
    ];

    protected $casts = [
        'calendar_event_start_time' => 'datetime',
        'calendar_event_end_time' => 'datetime',
    ];
    public function projects()
{
    return $this->belongsToMany(Project::class, 'project_calendar_events');
}
    public function parentEvent()
    {
        return $this->belongsTo(CalendarEvent::class, 'calendar_event_parent_id');
    }

    /**
     * Otroški dogodki (self-referential relationship).
     */
    public function childEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'calendar_event_parent_id');
    }
    public function reports()
    {
        return $this->hasMany(CalendarEventReport::class, 'calendar_event_id');
    }

    //poišče prvega
    public function report()
{
    return $this->hasOne(CalendarEventReport::class, 'calendar_event_id');
}
    public function calendarEventPersonRoles()
{
    return $this->hasManyThrough(
        CalendarEventPersonRole::class, // Ciljna entiteta
        CalendarEventPerson::class, // Srednja pivot tabela
        'calendar_event_id', // FK v pivot tabeli
        'id', // FK v ciljni tabeli
        'id', // Lokalni ključ v trenutnem modelu (CalendarEvent)
        'calendar_event_person_role_id' // Lokalni ključ v pivot tabeli
    );
}
    public function calendarEventPeople()
    {
        return $this->hasMany(CalendarEventPerson::class, 'calendar_event_id');
    }
    public function rolesForPerson($personId)
    {
        return $this->people()
                    ->where('person_id', $personId) // Filtrira osebe za danega `person_id`
                    ->get()
                    ->map(function ($person) {
                        // Vrnemo vlogo (relacija `calendarEventPersonRole` iz modela `CalendarEventPerson`)
                        return $person->pivot->calendarEventPersonRole;
                    })
                    ->filter(); // Odstrani `null` vrednosti, če kakšna vloga manjka
    }   

    public function ownership()
    {
        return $this->belongsTo(CalendarEventOwnership::class, 'calendar_event_ownership_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function type()
    {
        return $this->belongsTo(CalendarEventType::class, 'calendar_event_type_id');
    }
    public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }
    public function people()
    {
        return $this->belongsToMany(Person::class, 'calendar_event_people')
            ->withPivot('calendar_event_person_role_id') // Polje v pivot tabeli
            ->withTimestamps(); // Če imate timestamps v pivot tabeli
    }
    public function roles()
    {
        return $this->hasManyThrough(
            CalendarEventPersonRole::class, // Ciljna tabela (roles)
            CalendarEventPerson::class,    // Pivot tabela
            'calendar_event_id',           // Tuje ključ v pivot tabeli za `calendar_events`
            'id',                          // Primarni ključ v `calendar_event_person_roles`
            'id',                          // Primarni ključ v `calendar_events`
            'calendar_event_person_role_id' // Tuje ključ v pivot tabeli za `calendar_event_person_roles`
        );
    }
    public function peopleByRole($roleId)
    {
        return $this->people()->wherePivot('calendar_event_person_role_id', $roleId)->get();
    }
    public function owner()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
