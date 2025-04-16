<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;
use App\Models\App\AppColor;

use App\Models\Projects\ProjectAppMedia;



class AppMediaType extends Model
{
    use HasFactory;

    public function mediaForProject($projectId)
{
    return $this->hasMany(ProjectAppMedia::class)
                ->where('project_id', $projectId);
}

public function projectAppMedia()
{
    return $this->hasMany(ProjectAppMedia::class);
}


    public function color()
    {
        return $this->belongsTo(AppColor::class, 'app_color_id');
    }

    public function background()
    {
        return $this->belongsTo(AppColor::class, 'app_background_id');
    }

    public function remix_icon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
}
