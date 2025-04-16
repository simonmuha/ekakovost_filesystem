<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDescription extends Model
{
    use HasFactory;
    
    public function schoolOrganization()
    {
        return $this->belongsTo(SchoolOrganization::class);
    }

    public function descriptionType()
    {
        return $this->belongsTo(SchoolDescriptionType::class, 'school_description_type_id');
    }
}
