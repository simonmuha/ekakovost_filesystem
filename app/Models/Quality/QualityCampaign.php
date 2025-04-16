<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Quality\QualityCampaignQuestionnaire;
use App\Models\User\UserQuestionnaire;


class QualityCampaign extends Model
{
    use HasFactory;
    public function questionnaires()
    {
        return $this->belongsToMany(QualityQuestionnaire::class, 'quality_campaign_questionnaires', 'quality_campaign_id', 'quality_questionnaire_id');
        
    }
    public function targetgroups() 
    {
        return $this->belongsToMany(QualityTargetGroup::class, 'quality_campaign_target_groups', 'quality_campaign_id', 'quality_target_group_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Quality\QualityStatus', 'quality_status_id','id');
    }
    public function school_organization_year()
    {
        return $this->belongsTo('App\Models\School\SchoolOrganizationYear', 'school_organization_year_id','id');
    }
    public function answers()
    {
      return $this->hasMany('App\Models\Quality\QualityAnswer', 'quality_campaign_id');
    }
    public function campaign_questionnaires()
    {
        return $this->hasMany(QualityCampaignQuestionnaire::class, 'quality_campaign_id');
        
    }
    public function user_questionnaires()
    {
        return $this->hasMany(UserQuestionnaire::class, 'quality_campaign_id');
        
    }
}
