<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;

class QualityPersonRole extends Model
{
    use HasFactory;
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
}
