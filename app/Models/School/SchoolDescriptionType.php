<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDescriptionType extends Model
{
    use HasFactory;
    public function descriptions()
    {
        return $this->hasMany(SchoolDescription::class);
    }
}
