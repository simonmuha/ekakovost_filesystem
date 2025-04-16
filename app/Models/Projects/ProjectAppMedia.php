<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppMedia;

class ProjectAppMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'app_media_type_id',
        'media_title',
        'media_description',
        'media_value',
        'media_valid_from',
        'media_valid_until',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    // Tip medija (slika, spletna stran, ...)
    public function appMediaType()
    {
        return $this->belongsTo(\App\Models\App\AppMediaType::class, 'app_media_type_id');
    }

}
