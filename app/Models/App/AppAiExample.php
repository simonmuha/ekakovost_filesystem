<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppAiType;

class AppAiExample extends Model
{
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(AppAiType::class, 'app_ai_type_id');
    }
}
