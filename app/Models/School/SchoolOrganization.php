<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School\SchoolOrganizationYear;
use App\Models\School\SchoolEducationalProgram;
use App\Models\School\SchoolOrganizationEducationalProgram;

use App\Models\Person;


use App\Models\App\AppOrganization;
use App\Models\App\AppArea;
use App\Models\App\AppAreaPerson;

use App\Models\SchoolAreas\SchoolArea;

use App\Models\Calendars\Calendar;

use App\Models\SchoolAdmin\SchoolOrganizationSchoolArea;

use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Models\App\AppPosition;


class SchoolOrganization extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    public function socialMedia()
    {
        return $this->hasMany(SchoolSocialMedia::class, 'school_organization_id');
    }

    /**
     * Pridobi aktivna in trenutno veljavna socialna omrežja.
     */
    public function activeSocialMedia()
    {
        return $this->socialMedia()->where('school_social_media_is_active', true)
                                   ->where(function ($query) {
                                       $now = now();
                                       $query->whereNull('school_social_media_valid_from')->orWhere('school_social_media_valid_from', '<=', $now);
                                   })
                                   ->where(function ($query) {
                                       $now = now();
                                       $query->whereNull('school_social_media_valid_to')->orWhere('school_social_media_valid_to', '>=', $now);
                                   });
    }
    public function media()
    {
        return $this->hasMany(SchoolMedia::class, 'school_organization_id');
    }

    /**
     * Pridobi aktivne in trenutno veljavne medije.
     */
    public function activeMedia()
    {
        return $this->media()->where('school_media_is_active', true)
                             ->where(function ($query) {
                                 $now = now();
                                 $query->whereNull('school_media_valid_from')
                                       ->orWhere('school_media_valid_from', '<=', $now);
                             })
                             ->where(function ($query) {
                                 $now = now();
                                 $query->whereNull('school_media_valid_to')
                                       ->orWhere('school_media_valid_to', '>=', $now);
                             });
    }

    /**
     * Pridobi medije določene vrste (npr. slike, videi).
     */
    public function mediaByType($typeName)
    {
        return $this->media()->whereHas('mediaType', function ($query) use ($typeName) {
            $query->where('school_media_type_name', $typeName);
        });
    }
    public function descriptions()
    {
        return $this->hasMany(SchoolDescription::class);
    }
    public function description($type)
    {
        return $this->descriptions()
            ->whereHas('descriptionType', function ($query) use ($type) {
                $query->where('school_description_type_name_eng', $type);
            })
            ->where(function ($query) {
                // Preveri veljavnost in aktivnost
                $now = now();
                $query->where('school_description_is_active', true)
                      ->where(function ($q) use ($now) {
                          $q->whereNull('school_description_valid_from')->orWhere('school_description_valid_from', '<=', $now);
                      })
                      ->where(function ($q) use ($now) {
                          $q->whereNull('school_description_valid_to')->orWhere('school_description_valid_to', '>=', $now);
                      });
            })
            ->first(); // Vrne prvi veljaven opis
    }
    public function suborganizations()
    {
      return $this->hasMany(SchoolOrganization::class, 'school_organization_parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_parent_id');
    }
    public function educationalprograms()
    {
        return $this->belongsToMany(SchoolEducationalProgram::class, 'school_organization_educational_programs', 'school_organization_id', 'school_educational_program_id');
    }
    public function people_old()
    {
        return $this->belongsToMany(Person::class, 'school_organization_people', 'school_organization_id', 'person_id');
    }
    public function people()
    {
        return $this->hasMany(Person::class, 'school_organization_id');
    }
    
    public function positions_current_year()
    {
        $currentYear = $this->active_year;

        if ($currentYear) {
            return AppPosition::whereHas('school_organization_year_person_positions', function ($query) use ($currentYear) {
                $query->where('school_organization_year_id', $currentYear->id);
            })->get();
        }

        return collect();
    }
 
    public function years()
    {
        return $this->belongsToMany(SchoolYear::class, 'school_organization_years', 'school_organization_id', 'school_year_id');
    }
    public function active_year()
    {
        return $this->belongsTo(SchoolOrganizationYear::class, 'school_organization_year_id_current');
    }
    public function organization_years()
    {
        return $this->hasMany(SchoolOrganizationYear::class, 'school_organization_id');
    }

    public static function current_year($school_organization_id)
    {
        return SchoolOrganizationYear::where('school_organization_id', $school_organization_id)
            ->where('school_organization_year_current', true)
            ->first(); 
    }
    
    public static function school_organization_year_current($school_organization_id)
    {
        return SchoolOrganizationYear::where('school_organization_id', $school_organization_id)
            ->where('school_organization_year_current', true)
            ->first(); 
    }
    public function app_organization()
    {
        return $this->belongsTo(AppOrganization::class, 'app_organization_id');
    }

    public function school_admins()
    {
        // Poiščite ID področja za 'schooladmin'
        $schoolAdminArea = AppArea::where('app_area_code', 'schooladmin')->first();

        if ($schoolAdminArea) {
            // Pridobite ID področja
            $schoolAdminAreaId = $schoolAdminArea->id;

            // Vrni vse osebe, povezane s šolo, ki so šolski administratorji
            return $this->people()
                ->whereHas('areas', function ($query) use ($schoolAdminAreaId) {
                    $query->where('app_area_id', $schoolAdminAreaId);
                });
        }

        // Če področje 'schooladmin' ni najdeno, vrni prazno zbirko
        return collect();
    }
    public function school_admins_old()
    {
        $schoolAdminArea = AppArea::where('app_area_code', 'schooladmin')->first();
        
        if (!$schoolAdminArea) {
            return collect(); // Ali vrnemo prazno zbirko, če app_area_code 'schooladmin' ne obstaja
        }

        $schoolAdminAreaId = $schoolAdminArea->id;

        // Pridobimo vse osebe (people), ki so povezane z `school_organization_people` in so administratorji šole
        return $this->people()->whereHas('appAreaPeople', function($query) use ($schoolAdminAreaId) {
            $query->where('app_area_id', $schoolAdminAreaId);
        });

    }
    public function groups()
    {
        return $this->hasMany(SchoolGroup::class, 'school_organization_id');
    }
    public function school_areas()
    {
        return $this->belongsToMany(SchoolArea::class, 'school_organization_school_areas', 'school_organization_id', 'school_area_id');
    }

    public function school_organization_school_areas()
    {
        return $this->hasMany(SchoolOrganizationSchoolArea::class, 'school_organization_id');
    }
    

    public function calendar()
    {
        return $this->hasOne(Calendar::class, 'school_organization_id')->oldestOfMany();
    }


}
