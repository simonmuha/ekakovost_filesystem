<?php

namespace App\Models\Calendars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\School\SchoolOrganization;

class Calendar extends Model
{
    use HasFactory;
    public function organization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

    public function events()
    {
        return $this->hasMany(CalendarEvent::class, 'calendar_id');
    }
}
