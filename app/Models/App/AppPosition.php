<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

use App\Models\App\AppArea;
use App\Models\App\AppAreaAppPosition;
use App\Models\Projects\ProjectPeopleAppPosition;


use App\Models\School\SchoolOrganizationYearPersonPosition;

use App\Models\Projects\Project;
class AppPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_position_name', // Predvidevam, da obstaja stolpec z imenom položaja
        'app_position_description',
    ];
    public function categories()
    {
        return $this->belongsToMany(AppPositionCategory::class, 'app_position_category_pivots')
            ->withPivot('active') // omogoči dostop do active
            ->withTimestamps();
    }



    public function category()
    {
        return $this->belongsTo(AppPositionCategory::class, 'app_position_category_id');
    }
    public function peopleInProjects()
    {
        return $this->belongsToMany(Person::class, 'project_people_app_positions', 'app_position_id', 'person_id')
                    ->withPivot('project_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_people_app_positions', 'app_position_id', 'project_id')
                    ->withPivot('person_id', 'project_person_app_position_start_date', 'project_person_app_position_end_date')
                    ->withTimestamps();
    }
    public function projectPeoplePositions() {
        return $this->hasMany(ProjectPeopleAppPosition::class, 'app_position_id');
    }

    public function year_person_positions()
    {
        return $this->hasMany(SchoolOrganizationYearPersonPosition::class, 'app_position_id');
    }
    public function app_areas()
    {
        return $this->belongsToMany(AppArea::class, 'app_area_app_positions');
    }
    public function parentPositions()
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_app_subpositions', 'app_subposition_id', 'app_position_id');
    }

    public function subpositions_old1()
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_app_subpositions','app_position_id','app_subposition_id');
    }
    
    public function subpositions_old()
    {

        return $this->hasMany(AppPositionAppSubposition::class, 'app_position_id');
    }

    public function app_subpositions()
    {
        return $this->hasMany(AppPositionAppSubposition::class, 'app_position_id');
    }
    public function subpositions()
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_app_subpositions', 'app_position_id', 'app_subposition_id');
    }
    public function position_app_areas()
    {
      return $this->hasMany(AppAreaAppPosition::class, 'app_position_id');
    }
    public function areas()
    {
        return $this->belongsToMany(AppArea::class, 'app_area_app_positions');
    }
    public function people()
    {
        return $this->belongsToMany(Person::class, 'app_position_people', 'app_position_id', 'person_id');
    }

    // Funkcija, ki vrne ljudi iz določene organizacije, ki imajo to delovno mesto
    public function peopleInOrganization($organizationId)
    {
        return $this->people()->where('app_organization_id', $organizationId)->get();
    }
    public function peopleInSchool($schoolId, $schoolYearId)
    {
        return $this->people()
                    ->where('school_organization_id', $schoolId)
                    ->whereHas('school_organization_years', function ($query) use ($schoolYearId) {
                        $query->where('school_organization_year_id', $schoolYearId);
                    })
                    ->get();
    }

}
