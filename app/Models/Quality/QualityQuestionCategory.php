<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Quality\QualityQuestion;
use App\Models\App\AppIconRemixIcons;

class QualityQuestionCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_question_category_parent_id',
        'quality_question_category_name',
        'quality_question_category_description'
    ];
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
    public function parent()
    {
        return $this->belongsTo(QualityQuestionCategory::class, 'quality_question_category_parent_id');
    }

    public function subcategories()
    {
        return $this->hasMany(QualityQuestionCategory::class, 'quality_question_category_parent_id');
    }
    public function questions()
    {
        return $this->hasMany(QualityQuestion::class, 'quality_question_category_id');
    }
    public function main_questions()
    {
        return $this->hasMany(QualityQuestion::class, 'quality_question_category_id')->parentQuestions();
    }

}
