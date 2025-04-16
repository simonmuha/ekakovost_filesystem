<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAreaLevel extends Model
{
    use HasFactory;
    public function area()
    {
        return $this->belongsTo(SchoolArea::class, 'school_area_id');
    }
    public function school_area()
    {
        return $this->belongsTo(SchoolArea::class, 'school_area_id');
    }
    public function knows()
    {
      return $this->hasMany(SchoolAreaLevelKnow::class, 'school_area_level_id');
    }
    public function dos()
    {
      return $this->hasMany(SchoolAreaLevelDo::class, 'school_area_level_id');
    }
    public function guides()
    {
        return $this->hasMany(SchoolAreaLevelGuide::class);
    }
    public function getExampleActivitiesAttribute()
    {
        return $this->guides()->ofTypeName('Primeri aktivnosti')->get();
    }
    public function getExampleEvidencesAttribute()
    {
        return $this->guides()->ofTypeName('Primeri dokazil')->get();
    }
}
