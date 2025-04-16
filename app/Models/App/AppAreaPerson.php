<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppArea;

use App\Models\Person;

class AppAreaPerson extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_area_id',
        'person_id',
        'app_area_person_active'
    ];
    public function app_area()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function appArea()
    {
        return $this->belongsTo(AppArea::class);
    }
    
}
