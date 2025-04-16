<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;

class SchoolOrganizationEducationalProgramClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_year',
        'class_name',
        'school_organization_educational_program_id',
        // Ostale fillable lastnosti...
    ];
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
}
