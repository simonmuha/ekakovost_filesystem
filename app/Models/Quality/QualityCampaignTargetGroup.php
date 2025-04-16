<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityCampaignTargetGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_target_group_id', 
        'quality_campaign_id',
     ];

    public function target_group()
    {
        return $this->belongsTo('App\Models\Quality\QualityTargetGroup', 'quality_target_group_id','id');
    }
}
