<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_organization_id', 
        'school_media_type_id', 
        'school_media_url', 
        'school_media_valid_from', 
        'school_media_valid_to', 
        'school_media_is_active'
    ];

    /**
     * Relacija: medijski vnos pripada določeni šoli.
     */
    public function school()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

    /**
     * Relacija: medijski vnos pripada določenemu tipu medija.
     */
    public function mediaType()
    {
        return $this->belongsTo(SchoolMediaType::class, 'school_media_type_id');
    }

    /**
     * Preveri, ali je medij trenutno veljaven.
     */
    public function isCurrentlyValid()
    {
        $now = now();
        return $this->school_media_is_active &&
               ($this->school_media_valid_from === null || $this->school_media_valid_from <= $now) &&
               ($this->school_media_valid_to === null || $this->school_media_valid_to >= $now);
    }
}
