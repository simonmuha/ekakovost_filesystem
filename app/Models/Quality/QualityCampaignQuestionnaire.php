<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Quality\QualityCampaign;
use App\Models\Quality\QualityQuestionnaire;


class QualityCampaignQuestionnaire extends Model
{
    use HasFactory;
    public function campaign()
    {
        return $this->belongsTo(QualityCampaign::class, 'quality_campaign_id');
    }
    public function questionnaire()
    {
        return $this->belongsTo(QualityQuestionnaire::class, 'quality_questionnaire_id');
    }

}
