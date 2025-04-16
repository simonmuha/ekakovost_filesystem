<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School\SchoolYear;
use App\Models\School\SchoolOrganizationr;

use App\Models\Person;

use App\Models\App\AppPosition;



class SchoolOrganizationYear extends Model
{
    use HasFactory;
    public function year()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
    public function organization()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }
    public function people()
    {
        return $this->belongsToMany(
            Person::class,
            'school_organization_year_people', // Vmesna tabela
            'school_organization_year_id',    // Tuj ključ v vmesni tabeli
            'person_id'                       // Tuj ključ v tabeli people
        );
    }
    public function positions()
    {
        return $this->hasManyThrough(
            AppPosition::class,                                // Ciljna tabela (pozicije)
            SchoolOrganizationYearPersonPosition::class,       // Vmesna tabela
            'school_organization_year_person_id',              // Tuj ključ v `school_organization_year_person_positions` (do `school_organization_year_people`)
            'id',                                              // Primarni ključ v tabeli `app_positions`
            'id',                                              // Primarni ključ v `school_organization_years`
            'app_position_id'                                  // Tuj ključ v `school_organization_year_person_positions` (do `app_positions`)
        );
    }
    public function year_people()
    {
        return $this->hasMany(SchoolOrganizationYearPerson::class, 'school_organization_year_id');
    }
}
