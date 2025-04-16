<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\Projects\Project;
use App\Models\App\AppPosition;
use App\Models\App\AppPositionCategoryPivot;

class ProjectPeopleAppPosition extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id', 
        'person_id', 
        'app_position_id', 
        'position_category_pivot_id',
        'project_person_app_position_start_date', 
        'project_person_app_position_end_date'
    ];
    
    public function project() {
        return $this->belongsTo(Project::class);
    }
    
    public function person() {
        return $this->belongsTo(Person::class);
    }
    
    public function position() {
        return $this->belongsTo(AppPosition::class, 'app_position_id');
    }
    public function position_category_pivot() {
        return $this->belongsTo(AppPositionCategoryPivot::class, 'position_category_pivot_id');
    }

}
