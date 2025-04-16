<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppSocialMediaType;


class SchoolSocialMedia extends Model
{
    use HasFactory;
    public function appSocialMediaType()
    {
        return $this->belongsTo(AppSocialMediaType::class, 'app_social_media_type_id');
    }
}
