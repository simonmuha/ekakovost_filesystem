<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\Projects\Project;
use App\Models\Posts\Post;

class ProjectPost extends Pivot
{
    use HasFactory;

    protected $table = 'project_posts'; // <- UJEMAJ se z imenom v bazi

    protected $fillable = [
        'project_id',
        'post_id',
        'project_post_date',
        'project_post_description',
    ];

    protected $casts = [
        'project_post_date' => 'date',
    ];

    // Relacije (opcijsko, če jih rabiš)
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
