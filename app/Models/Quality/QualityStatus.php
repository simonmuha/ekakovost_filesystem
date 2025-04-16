<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;

class QualityStatus extends Model
{
    use HasFactory; 
    protected $fillable = [
        'quality_status_color',
        'quality_status_background',
        'quality_status_icon',
        'app_icon_remix_icon_id', // tuji ključ
    ];
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
}
