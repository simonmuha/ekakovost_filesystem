<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School\SchoolEducationalProgram;
use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolYear;
use App\Models\School\SchoolOrganizationEducationalProgramClass;



class SchoolOrganizationEducationalProgram extends Model
{
    use HasFactory;
    public function educationalprogram()
    {
        return $this->belongsTo(SchoolEducationalProgram::class, 'school_educational_program_id');
    }
    public function organization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

    public function year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id');
    }
    public function classes()
    {
        return $this->hasMany(SchoolOrganizationEducationalProgramClass::class, 'school_organization_educational_program_id');
    }
}
