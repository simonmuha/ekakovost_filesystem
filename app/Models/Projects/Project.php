<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\Person;

use App\Models\App\AppOrganization;
use App\Models\App\AppMedia;
use App\Models\School\SchoolOrganization;

use App\Models\Calendars\CalendarEvent;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_name_short',
        'project_description',
        'project_description_short',
        'project_start_date',
        'project_end_date',
        'project_cover_image',
        'project_link',
        'project_owner_id',
        'project_app_organization_id',
        'project_school_organization_id',
        'project_status_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(\App\Models\Posts\Post::class, 'project_posts')
            ->using(\App\Models\Projects\ProjectPost::class)
            ->withPivot('project_post_date', 'project_post_description')
            ->withTimestamps();
    }

    
    public function appMedia()
{
    return $this->hasMany(ProjectAppMedia::class);
}
    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function calendarEvents() 
{
    return $this->belongsToMany(CalendarEvent::class, 'project_calendar_events');
}
    public function peopleByCategory($categoryId)
    {
        return $this->people()
            ->whereHas('appPositions', function ($query) use ($categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('app_position_categories.id', $categoryId);
                });
            })->get();
    }
    public function project_people_app_position()
    {
        return $this->hasMany(ProjectPeopleAppPosition::class, 'project_id');
    }

    // Metoda za pridobitev vseh ljudi (preko pivot tabele)
    public function project_people()
    {
        return $this->belongsToMany(Person::class, 'project_people_app_positions', 'project_id', 'person_id')
                    ->withPivot('app_position_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }

    public function people() 
{
    return $this->belongsToMany(Person::class, 'project_people_app_positions', 'project_id', 'person_id')
                ->withTimestamps()
                ->withPivot('app_position_id')
                ->join('app_positions', 'project_people_app_positions.app_position_id', '=', 'app_positions.id');
}
    public function owner()
    {
        return $this->belongsTo(Person::class, 'project_owner_id');
    }
    
    public function app_organization()
    {
        return $this->belongsTo(AppOrganization::class, 'project_app_organization_id');
    }

    public function schoolOrganization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'project_school_organization_id');
    }

    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id');
    }

    public function peoplePositions() { 
        return $this->hasMany(ProjectPeopleAppPosition::class);
    }
    public function peopleWithPositions()
    {
        return $this->belongsToMany(Person::class, 'project_people_app_positions', 'project_id', 'person_id')
                    ->withPivot('app_position_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }
}
