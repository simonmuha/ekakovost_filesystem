<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppAiType;

class AppAiSegment extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'app_ai_segment_description',
        'app_ai_id',
        'app_ai_type_id',
        // other fillable attributes
    ];
    public function app_ai()
    {
        return $this->belongsTo(AppAi::class);
    }
    public function type()
    {
        return $this->belongsTo(AppAiType::class, 'app_ai_type_id');
    }
}
