<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSuggestion extends Model
{
    use HasFactory;
    protected $table = 'app_suggestions';

    protected $fillable = [
        'app_person_id',
        'app_area_id',
        'app_suggestion_description',
    ];

    // Relacija z uporabnikom
    public function person()
    {
        return $this->belongsTo(Person::class, 'app_person_id');
    }

    // Relacija z app_area
    public function appArea()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }
    
    public function app_area()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }
}
