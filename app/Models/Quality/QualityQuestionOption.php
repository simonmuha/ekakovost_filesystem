<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityQuestionOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_question_id',
        'quality_question_option_text',
        'quality_question_option_value',
        'quality_question_option_order',
        'quality_question_option_other',
    ];
    // Povezava na vprašanje
    public function question()
    {
        return $this->belongsTo(QualityQuestion::class, 'quality_question_id');
    }
}
