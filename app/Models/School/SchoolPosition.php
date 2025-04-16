<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppArea;
use App\Models\School\SchoolPositionAppArea;
use App\Models\School\SchoolArea;


class SchoolPosition extends Model
{
    use HasFactory;
    public function subpositions()
    {
      return $this->hasMany(SchoolPosition::class, 'school_position_parent_id');
    }
    public function app_areas()
    {
        return $this->belongsToMany(AppArea::class, 'school_position_app_areas');
    }
    public function position_app_areas()
    {
      return $this->hasMany(SchoolPositionAppArea::class, 'school_position_id');
    }
    public function areas()
    {
        return $this->belongsToMany(SchoolArea::class, 'school_area_school_positions');
    }
}
