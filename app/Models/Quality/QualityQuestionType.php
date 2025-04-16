<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityQuestionType extends Model
{
    use HasFactory;

    public function options() 
    {
        return $this->hasMany('App\Models\Quality\QualityQuestionTypeOption', 'quality_question_type_id','id');
    }

}
