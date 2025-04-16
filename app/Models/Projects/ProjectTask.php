<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_task_parent_id',
        'project_id',
        'project_task_title',
        'project_task_description',
        'project_task_status_id',
        'project_task_due_date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function status()
    {
        return $this->belongsTo(ProjectTaskStatus::class, 'project_task_status_id');
    }

    public function parentTask()
    {
        return $this->belongsTo(ProjectTask::class, 'project_task_parent_id');
    }

    public function subtasks()
    {
        return $this->hasMany(ProjectTask::class, 'project_task_parent_id');
    }
}
