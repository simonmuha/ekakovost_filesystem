<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class QualityTargetGroupPersonRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_person_role_id', 
        'quality_target_group_id'
    ];

}
