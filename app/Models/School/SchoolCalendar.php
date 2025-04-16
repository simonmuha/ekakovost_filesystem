<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCalendar extends Model
{
    use HasFactory;
    public function organization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

    public function events()
    {
        return $this->hasMany(SchoolCalendarEvent::class, 'school_calendar_id');
    }
}
