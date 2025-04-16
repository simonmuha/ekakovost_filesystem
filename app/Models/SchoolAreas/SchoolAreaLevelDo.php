<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAreaLevelDo extends Model
{
    use HasFactory;
    public function level()
    {
        return $this->belongsTo(SchoolAreaLevel::class, 'school_area_level_id');
    }
    public function evidences()
    {
      return $this->hasMany(SchoolAreaLevelDoEvidence::class, 'school_area_level_do_id');
    }
}
