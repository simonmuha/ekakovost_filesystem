<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityTargetGroup extends Model
{
    use HasFactory;
    public function status()
    {
        return $this->belongsTo('App\Models\Quality\QualityStatus', 'quality_status_id','id');
    }
    public function personrole()
    {
        return $this->belongsTo('App\Models\Quality\QualityPersonRole', 'quality_person_role_id','id');
    }
    public function personroles()
    {
        return $this->belongsToMany('App\Models\Quality\QualityPersonRole', 'quality_target_group_person_roles', 'quality_target_group_id', 'quality_person_role_id');
        
    }
    public function school_organization_year()
    {
        return $this->belongsTo('App\Models\School\SchoolOrganizationYear', 'school_organization_year_id','id');
    }
    public function classes() 
    { 
        return $this->belongsToMany('App\Models\School\SchoolOrganizationEducationalProgramClass', 'quality_target_group_classes', 'quality_target_group_id', 'school_organization_educational_program_class_id'); 
    } 

}
