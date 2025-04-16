<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Quality\QualityStatus;
class AppIconRemixIcons extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_icon_name',
        'app_icon_name_eng',
        'app_icon_code',
    ];
    public function qualityStatuses()
    {
        return $this->hasMany(QualityStatus::class, 'app_icon_remix_icon_id');
    }
}
