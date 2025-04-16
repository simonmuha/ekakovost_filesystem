<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppIconRemixIcons;
use App\Models\App\AppColor;

class ProjectTaskStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_task_status_name',
        'app_color_id',
        'app_background_id',
        'app_icon_remix_icon_id',
    ];

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class, 'project_task_status_id');
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
