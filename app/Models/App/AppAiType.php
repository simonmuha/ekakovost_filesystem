<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppAiExample;
use App\Models\App\AppAiSegment;

class AppAiType extends Model
{
    use HasFactory;
    public function examples()
    {
        return $this->hasMany(AppAiExample::class, 'app_ai_type_id');
    }
    public function segments()
    {
        return $this->hasMany(AppAiSegment::class, 'app_ai_type_id');
    }
}
