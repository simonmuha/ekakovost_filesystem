<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\School\SchoolOrganization;

class SchoolOrganizationPerson extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_organization_id',
        'person_id',
        'school_organization_year_id',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function school_organization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }
    public function school_organization_year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id');
    }
}
