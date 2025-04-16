<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCalendarEvent extends Model
{
    use HasFactory;
    protected $casts = [
        'school_calendar_event_start_time' => 'datetime',
        'school_calendar_event_end_time' => 'datetime',
    ];
    
    public function ownership()
    {
        return $this->belongsTo(SchoolCalendarEventOwnership::class, 'school_calendar_event_ownership_id');
    }
    public function type()
    {
        return $this->belongsTo(SchoolCalendarEventType::class, 'school_calendar_event_type_id');
    }
    public function calendar()
    {
        return $this->belongsTo(SchoolCalendar::class, 'school_calendar_id');
    }

}
