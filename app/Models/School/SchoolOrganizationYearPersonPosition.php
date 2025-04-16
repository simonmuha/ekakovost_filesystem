<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppPosition;
use App\Models\Person;


class SchoolOrganizationYearPersonPosition extends Model
{
    use HasFactory;
    protected $table = 'school_organization_year_person_positions';

    public function app_position()
    {
        return $this->belongsTo(AppPosition::class, 'app_position_id');
    }
    public function school_organization_year_person()
    {
        return $this->belongsTo(SchoolOrganizationYearPerson::class, 'school_organization_year_person_id');
    }
    public function schoolOrganizationYearPerson()
    {
        return $this->belongsTo(SchoolOrganizationYearPerson::class, 'school_organization_year_person_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function school_organization_year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id');
    }
}
