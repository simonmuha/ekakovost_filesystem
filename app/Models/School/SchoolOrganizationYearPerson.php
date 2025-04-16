<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class SchoolOrganizationYearPerson extends Model
{
    use HasFactory;
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function school_organization_year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id');
    }
    public function positions() 
    {
        return $this->hasMany(SchoolOrganizationYearPersonPosition::class, 'school_organization_year_person_id');
    }
    public function year_person()
    {
        return $this->belongsTo(SchoolOrganizationYearPerson::class, 'school_organization_year_person_id');
    }
    public function year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id');
    }
}
