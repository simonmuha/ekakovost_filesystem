<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;

class QualityQuestionnaireCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_questionnaire_category_parent_id',
        'quality_questionnaire_category_name',
        'quality_questionnaire_category_description'
    ];
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
    public function parent()
    {
        return $this->belongsTo(QualityQuestionnaireCategory::class, 'quality_questionnaire_category_parent_id');
    }

    public function subcategories()
    {
        return $this->hasMany(QualityQuestionnaireCategory::class, 'quality_questionnaire_category_parent_id');
    }
    public function questionnaires()
    {
        return $this->hasMany(QualityQuestionnaire::class, 'quality_questionnaire_category_id');
    }
}
