<?php

namespace App\Models\SchoolAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAreaLevelDoEvidence extends Model
{
    use HasFactory;
    public function do()
    {
        return $this->belongsTo(SchoolAreaLevelDo::class, 'school_area_level_do_id');
    }
}
