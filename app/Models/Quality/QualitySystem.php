<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualitySystem extends Model
{
    use HasFactory;
    public function standards()
    {
        return $this->hasMany('App\Models\Quality\QualityStandard', 'quality_system_id','id');
    }
}
