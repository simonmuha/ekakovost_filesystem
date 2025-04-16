<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCalendarEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'calendar_event_id',
        'active',
    ];
    public function calendarEvent()
    {
        return $this->belongsTo(\App\Models\Calendars\CalendarEvent::class, 'calendar_event_id');
    }

    // Povezava s projektom
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
