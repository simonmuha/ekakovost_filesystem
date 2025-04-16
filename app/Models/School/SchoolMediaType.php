<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMediaType extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_media_type_name', 
        'school_media_type_name_eng', 
        'school_media_type_description'
    ];

    /**
     * Relacija: en tip medija ima lahko več medijskih vnosov.
     */
    public function media()
    {
        return $this->hasMany(SchoolMedia::class, 'school_media_type_id');
    }
}
