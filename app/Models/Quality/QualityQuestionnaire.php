<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityQuestionnaire extends Model
{
    use HasFactory;

    public function questions() 
    {
        return $this->belongsToMany(QualityQuestion::class, 'quality_questionnaire_questions', 'quality_questionnaire_id', 'quality_question_id');
        
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Quality\QualityStatus', 'quality_status_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Quality\QualityQuestionnaireCategory', 'quality_questionnaire_category_id','id');
    }
    public function school_organization_year()
    {
        return $this->belongsTo('App\Models\School\SchoolOrganizationYear', 'school_organization_year_id','id');
    }
}
