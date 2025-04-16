<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quality\QualityQuestion;

class QualityIndicator extends Model
{
    use HasFactory;
    public function standard()
    {
        return $this->belongsTo('App\Models\Quality\QualityStandard', 'quality_standard_id','id');
    }
    public function questions()
    {
        return $this->belongsToMany(QualityQuestion::class, 'quality_question_indicators', 'quality_indicator_id', 'quality_question_id');
        
    }
}
