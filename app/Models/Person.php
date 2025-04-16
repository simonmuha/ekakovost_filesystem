<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolOrganizationPerson;
use Illuminate\Support\Facades\Auth;

use App\Models\App\AppRole;
use App\Models\App\AppRolePerson;
use App\Models\App\AppAreaPerson;
use App\Models\App\AppArea;
use App\Models\App\AppOrganization;
use App\Models\App\AppPosition;
use App\Models\App\AppUserActiveStatus;
use App\Models\App\AppNotification;


use App\Models\School\SchoolOrganizationYear;
use App\Models\School\SchoolOrganizationYearPersonPosition;

use App\Models\Calendars\CalendarEventPersonRole;
use App\Models\Calendars\CalendarEventPerson;
use App\Models\Calendars\CalendarEvent;

use App\Models\Posts\PostView;
use App\Models\Posts\Post;

use App\Models\Emails\Email;

use App\Models\Projects\ProjectPeopleAppPosition;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = [
        'user_id', 'school_organization_id', 'app_organization_id', 'person_name', 'person_surname', 
        'person_email', 'person_nickname', 'person_gender', 'person_employment_start_date', 
        'person_employment_end_date', 'person_home_image', 'person_description', 'person_GSM', 
        'person_birth_date', 'person_eye_color', 'person_hair_colour', 'person_hair_length', 
        'person_height', 'person_physique',
        'person_name',
        'person_email',
    ];
    
// Prejemnik e-pošte

// ----------------- Projects ----------------------

public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'project_owner_id');
    }

    /**
     * Relacija do projektov, kjer je oseba sodelovala.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_people_app_positions', 'person_id', 'project_id')
                    ->withPivot('app_position_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }

    /**
     * Relacija do položajev, ki jih ima oseba v projektih.
     */
    public function project_positions()
    {
        return $this->belongsToMany(AppPosition::class, 'project_people_app_positions', 'person_id', 'app_position_id')
                    ->withPivot('project_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }

public function projectPositions() {
    return $this->hasMany(ProjectPeopleAppPosition::class);
}
public function appPositions()
{
    return $this->belongsToMany(AppPosition::class, 'project_people_app_positions', 'person_id', 'app_position_id');
}
//--------------------------------------------------------------------------------
public function receivedEmails()
{
    return $this->hasMany(Email::class, 'email_recipient_id');
}

// Poslane e-pošte
public function sentEmails()
{
    return $this->hasMany(Email::class, 'email_sender_id');
}
    public function school_organization_year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class);
    }
    public function viewedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_views', 'person_id', 'post_id')
                    ->withTimestamps();
    }

    /**
     * Get all the post views related to the person.
     */
    public function postViews()
    {
        return $this->hasMany(PostView::class);
    }

    public function notifications()
    {
        return $this->hasMany(AppNotification::class, 'person_id', 'id');
    }
    public function unread_notifications()
    {
        return $this->hasMany(AppNotification::class, 'person_id', 'id')
            ->whereNull('app_notification_read_at'); // Samo kjer je app_notification_read_at NULL
    }
    public function calendarEvents()
    {
        return $this->belongsToMany(CalendarEvent::class, 'calendar_event_people', 'person_id', 'calendar_event_id')
                    ->withPivot('calendar_event_person_role_id');
    }
    public function calendar_event_owner()  
    {
        return $this->hasMany(CalendarEvent::class, 'person_id', 'id');
    }

    public function rolesForEvent($calendar_event_id)
    {
        return $this->belongsToMany(CalendarEventPersonRole::class, 'calendar_event_people', 'person_id', 'calendar_event_person_role_id')
                    ->wherePivot('calendar_event_id', $calendar_event_id)
                    ->get();
    }
    public function event_roles()
    {
        return $this->hasManyThrough(
            CalendarEventPersonRole::class,
            CalendarEventPerson::class,
            'person_id',
            'id',
            'id',
            'calendar_event_person_role_id'
        );
    }
    public function person_organizations()  
    {
      return $this->hasMany(SchoolOrganizationPerson::class, 'person_id');
    }

    public function organizations()
    {
        return $this->belongsToMany(SchoolOrganization::class, 'school_organization_people', 'person_id', 'school_organization_id');
    }

    public function person_school_organizations()
    {
        // Poišči aktivno organizacijo uporabnika
        $active_organization = SchoolOrganizationPerson::where('person_id', Auth::user()->person->id)
            ->where('active', true)
            ->first();

        if ($active_organization) {
            // Poišči vse zapise za aktivno organizacijo in osebo
            return SchoolOrganizationPerson::where('person_id', Auth::user()->person->id)
                ->where('school_organization_id', $active_organization->school_organization_id)
                ->get();
        } else {
            // Če ni aktivne organizacije, vrni prazno kolekcijo ali null
            return collect(); // ali return null;
        }
        
    }
    public function person_roles() 
    //povezava s povezovalno tabelo
    {
      return $this->hasMany(AppRolePerson::class, 'person_id');
    }
    public function roles()
    {
        return $this->belongsToMany(AppRole::class, 'app_role_people');
    }
    public function app_areas()
    //povezava s povezovalno tabelo
    {
      return $this->hasMany(AppAreaPerson::class, 'person_id');
    }
    public function areas()
    {
        return $this->belongsToMany(AppArea::class, 'app_area_people', 'person_id', 'app_area_id');
    }
    public function app_areas_new()
    {
        return $this->belongsToMany(AppArea::class, 'app_area_people', 'people_id', 'app_area_id');
    }
    public function organization()
    {
        return $this->belongsTo(AppOrganization::class, 'app_organization_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function appAreaPeople()
    {
        return $this->hasMany(AppAreaPerson::class);
    }
    public function app_area_people()
    {
        return $this->hasMany(AppAreaPerson::class, 'person_id');
    }
    public function appAreasPeople()
    {
        return $this->hasMany(AppAreaPerson::class, 'person_id');
    }
    public function appAreas()
    {
        return $this->belongsToMany(AppArea::class, 'app_area_people', 'person_id', 'app_area_id')
                    ->withPivot('app_area_person_active');
    }
    public function school() 
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }
    public function positions_old()
    {
        return $this->belongsToMany(AppArea::class, 'school', 'person_id', 'app_area_id');
    }
    public function positions() 
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_people', 'person_id', 'app_position_id');
    }
    public function SchoolOrganizationYearPersonPositions()
    {
        return $this->hasMany(SchoolOrganizationYearPersonPosition::class, 'person_id');
    }
    public function position($positionCode)
    {
        return $this->positions()->where('app_position_code', $positionCode)->first();
    }
    public function person_app_areas() {
        return $this->positions()
                    ->join('app_area_app_positions', 'app_positions.id', '=', 'app_area_app_positions.app_position_id')
                    ->join('app_areas', 'app_area_app_positions.app_area_id', '=', 'app_areas.id')
                    ->whereNull('app_areas.app_area_parent_id')
                    ->select('app_areas.*')
                    ->distinct();
    }
    public function activeStatus()
    {
        return $this->hasOne(AppUserActiveStatus::class, 'person_id');
    }
    public function school_organization_year_current()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id_current');
    }
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Get the school organization years associated with the person.
     *
     * This defines a many-to-many relationship between the Person and 
     * SchoolOrganizationYear models through the 'school_organization_year_people' 
     * pivot table. The 'person_id' is the foreign key in the pivot table 
     * referencing the Person, and 'school_organization_year_id' is the foreign key 
     * referencing the SchoolOrganizationYear.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

/******  5b0afe44-bbb1-4b22-af0d-127c1afde32e  *******/
    public function school_organization_years()
    {
        return $this->belongsToMany(SchoolOrganizationYear::class, 'school_organization_year_people', 'person_id', 'school_organization_year_id');
    }
    
}
