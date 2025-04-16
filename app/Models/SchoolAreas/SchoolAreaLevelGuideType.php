<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAreaLevelGuideType extends Model
{
    use HasFactory;
    public function guides()
    {
        return $this->hasMany(SchoolAreaLevelGuide::class, 'school_area_level_guide_type_id');
    }
}
