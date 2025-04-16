<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\App\AppPosition;

class SchoolArea extends Model
{
    use HasFactory;
    public function levels()
    {
      return $this->hasMany(SchoolAreaLevel::class, 'school_area_id');
    }
    public function positions()
    {
        return $this->belongsToMany(AppPosition::class, 'school_area_app_positions');
    }
}
