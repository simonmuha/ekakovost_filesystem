<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityAnswer extends Model
{
    use HasFactory;
    public function question()
    {
        return $this->belongsTo('App\Models\Quality\QualityQuestion', 'quality_question_id','id');
    }
    public function isValueChanged()
    {
        return $this->quality_answer_value != $this->getOriginal('quality_answer_value');
    }
    public function targetgroup()
    {
        return $this->belongsTo('App\Models\Quality\QualityTargetGroup', 'quality_target_group_id','id');
    }
    public function person_role()
    {
        return $this->belongsTo('App\Models\Quality\QualityPersonRole', 'quality_person_role_id','id');
    }
    
}
