<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School\SchoolEducationalProgramType;

class SchoolEducationalProgram extends Model
{
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(SchoolEducationalProgramType::class, 'school_educational_program_type_id');
    }
}
