<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityStandard extends Model
{
    use HasFactory;
    protected $fillable = ['quality_standard_parent_id', 'quality_standard_name'];

    public function substandards()
    {
      return $this->hasMany('App\Models\Quality\QualityStandard', 'quality_standard_parent_id');
    }
    public function system()
    {
        return $this->belongsTo('App\Models\Quality\QualitySystem', 'quality_system_id','id');
    }
    public function indicators()
    {
        return $this->hasMany('App\Models\Quality\QualityIndicator', 'quality_standard_id','id');
    }
}
