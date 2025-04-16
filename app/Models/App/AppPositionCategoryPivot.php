<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPositionCategoryPivot extends Model
{
    use HasFactory;
    public function app_position()
    {
        return $this->belongsTo(AppPosition::class, 'app_position_id');
    }
    public function app_position_category()
    {
        return $this->belongsTo(AppPositionCategory::class, 'app_position_category_id');
    }

}
