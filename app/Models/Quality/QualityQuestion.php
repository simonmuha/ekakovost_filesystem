<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quality\QualityIndicator;
use App\Models\Quality\QualityPersonRole;
use App\Models\Quality\QualityTag;


class QualityQuestion extends Model
{

    use HasFactory;



    
    public function options()
    {
        return $this->hasMany(QualityQuestionOption::class, 'quality_question_id');
    }
    public function indicator()
    {
        return $this->belongsTo('App\Models\Quality\QualityIndicator', 'quality_indicator_id','id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Quality\QualityQuestionType', 'quality_question_type_id','id');
    }
    public function indicators()
    {
        return $this->belongsToMany(QualityIndicator::class, 'quality_question_indicators', 'quality_question_id', 'quality_indicator_id');
    }
    public function subquestions()
    {
      return $this->hasMany('App\Models\Quality\QualityQuestion', 'quality_question_parent_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Quality\QualityQuestion', 'quality_question_parent_id');
    }
    
    public function person_role()
    {
        return $this->belongsTo('App\Models\Quality\QualityPersonRole', 'quality_person_role_id','id');
    }
    public function personrole()
    {
        return $this->belongsTo(QualityPersonRole::class, 'quality_person_role_id');
    }

    public function questionnaires()
    {
        return $this->belongsToMany(QualityQuestionnaire::class, 'quality_questionnaire_questions', 'quality_question_id', 'quality_questionnaire_id');
    }
    public function category()
    {
        return $this->belongsTo(QualityQuestionCategory::class, 'quality_question_category_id');
    }

    public function scopeParentQuestions($query)
    {
        return $query->whereNull('quality_question_parent_id');
    }
    public function tags()
    {
        return $this->belongsToMany(QualityTag::class, 'quality_question_tags', 'quality_tag_id', 'quality_question_id');
        
    }

}
