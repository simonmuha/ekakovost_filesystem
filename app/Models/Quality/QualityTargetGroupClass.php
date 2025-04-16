<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;

class QualityTargetGroupClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_organization_educational_program_class_id', 
        'quality_target_group_id'
    ];
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
}
