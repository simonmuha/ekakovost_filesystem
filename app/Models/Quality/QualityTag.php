<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityTag extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->belongsToMany(QualityQuestion::class, 'quality_question_tags', 'quality_question_id', 'quality_tag_id');
        
    }
}
