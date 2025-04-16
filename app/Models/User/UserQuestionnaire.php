<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionnaire extends Model
{
    use HasFactory;
    public function person_role()
    {
        return $this->belongsTo('App\Models\Quality\QualityPersonRole', 'quality_person_role_id','id');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Models\Quality\QualityCampaign', 'quality_campaign_id','id');
    }
    public function user_questionnaire_answers()
    {
        return $this->hasMany(UserQuestionnaireAnswer::class, 'user_questionnaire_id');
        
    }
}
