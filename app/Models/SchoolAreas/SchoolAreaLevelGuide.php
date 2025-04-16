<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAreaLevelGuide extends Model
{
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(SchoolAreaLevelGuideType::class, 'school_area_level_guide_type_id');
    }

    public function level()
    {
        return $this->belongsTo(SchoolAreaLevel::class, 'school_area_level_id');
    }
    public function scopeOfTypeName($query, $typeName)
    {
        return $query->whereHas('type', function ($q) use ($typeName) {
            $q->where('school_area_level_guide_type_name', $typeName);
        });
    }
}
