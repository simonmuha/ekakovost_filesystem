<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\App\AppArea;
use App\Models\App\AppPermission;


class SchoolPositionAppArea extends Model
{
    use HasFactory;
    protected $table = 'school_position_app_areas';
    protected $fillable = ['school_position_id', 'app_area_id', 'app_area_parent_id'];

    public function subareas()
    {
        return $this->hasMany(SchoolPositionAppArea::class, 'app_area_parent_id', 'app_area_id')
                ->where('school_position_id', $this->school_position_id);
    }

    // Relacija za nadrejeno področje
    public function parent()
    {
        return $this->belongsTo(SchoolPositionAppArea::class, 'app_area_parent_id');
    }

    // Relacija za school_position
    public function schoolPosition()
    {
        return $this->belongsTo(SchoolPosition::class, 'school_position_id');
    }

    // Relacija za app_area
    public function app_area()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }
    public function app_permissions()
    {
        return $this->belongsToMany(AppPermission::class, 'school_position_app_area_app_permissions');
    }
}
