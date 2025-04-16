<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppAiSegment;

class AppAi extends Model
{
    use HasFactory;
    public function segments()
    {
        return $this->hasMany(AppAiSegment::class, 'app_ai_id');
    }
}
