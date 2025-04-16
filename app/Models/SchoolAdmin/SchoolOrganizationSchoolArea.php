<?php

namespace App\Models\SchoolAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SchoolAreas\SchoolArea;
use App\Models\School\SchoolOrganization;

class SchoolOrganizationSchoolArea extends Model
{
    use HasFactory;
    public function school_area()
    {
        return $this->belongsTo(SchoolArea::class, 'school_area_id');
    }
    public function school()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

}
