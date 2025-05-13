<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\School\SchoolOrganization;

use App\Models\App\AppAreaPerson;
use App\Models\App\AppUserActiveStatus;

use App\Notifications\ResetPasswordNotification;

use App\Models\Storage\Entity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    public function entities()
    {
        return $this->belongsToMany(Entity::class, 'user_entity');
    }

    public $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_profile_image',
        'team_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function active_status()
    {
        return $this->hasOne(AppUserActiveStatus::class);
        
    }
    public function organizations()
    {
        return $this->belongsToMany(SchoolOrganization::class, 'admin_organization_users', 'user_id', 'admin_organization_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'user_person_id');
    }
    public function person_active_old()
    {
        return $this->belongsTo(Person::class, 'id', 'user_id')->whereHas('activeStatus', function($query) {
            $query->where('user_id', $this->id);
        });
    }
    public function people()
    {
        return $this->hasMany(Person::class, 'user_id');
    }
    public function team()
    {
        return $this->belongsTo(SchoolOrganization::class, 'team_id');
    }
    public function if_appadmin()
    {
        // Preveri, če ima povezani Person vlogo 'AppAdmin'
        return $this->person->areas()
            ->where('app_area_code', 'appadmin')
            ->where('app_area_person_active', true)
            ->exists();
    }
    public function if_school()
    {
        // Preveri, če ima povezani Person vlogo 'AppAdmin'
        return $this->person->areas()
        ->where('app_area_code', 'school')
        ->where('app_area_person_active', true)
        ->exists();
    }
    public function if_expertgroup()
    {
        // Preveri, če ima povezani Person vlogo 'AppAdmin'
        return $this->person->areas()
        ->where('app_area_code', 'ExpertGroup')
        ->where('app_area_person_active', true)
        ->exists();
    }
    
    public function if_egquestionaires()
    {
        return $this->person->areas()
        ->where('app_area_code', 'egquestionaires')
        ->where('app_area_person_active', true)
        ->exists();
    }
    public function if_qualitysystemss()
    {
        return $this->person->areas()
        ->where('app_area_code', 'qualitysystems')
        ->where('app_area_person_active', true)
        ->exists();
    }
    public function scopeCurrentTeam($query)
    {
        return $query->where('team_id', auth()->user()->current_team_id);
    }
    public function getActiveOrganizationAttribute()
    {
        $activeStatus = AppUserActiveStatus::where('user_id', $this->id)->first();

        if ($activeStatus) {
            // Poiščemo osebo glede na aktivni status
            $person = Person::find($activeStatus->person_id);

            if ($person) {
                // Vrne organizacijo povezano z osebo
                return $person->organization;
            }
        }

        return null;
        //staro
        $peopleIds = $this->people->pluck('id')->toArray();
        
        // Poiščite prvi app_area_person, ki je aktiven in pripada kateremukoli od teh profilov
        $app_area_person_active = AppAreaPerson::whereIn('person_id', $peopleIds) 
            ->where('app_area_person_active', true)
            ->first();
        
        return $app_area_person_active ? $app_area_person_active->person->organization : null;
    }
    public function getActiveSchoolAttribute()
    {
        // Najprej pridobite aktivno organizacijo
        $activeOrganization = $this->active_organization;

        // Če obstaja aktivna organizacija, pridobite povezano šolo
        if ($activeOrganization) {
            return $activeOrganization->school;
        }

        // Če ni aktivne organizacije, vrnite null
        return null;
    }
    public function appAreasPeople() 
    {
        return $this->hasManyThrough(AppAreaPerson::class, Person::class, 'user_id', 'person_id', 'id', 'id');
    }
    public function has_person($person_id): bool
    {
        return $this->people->contains('id', $person_id);
    }
    //poišče aktivni profil uporabnika
    public function activeStatus()
    {
        return $this->hasOne(AppUserActiveStatus::class, 'user_id');
    }

    public function activePerson()
    {
        return $this->hasOneThrough(Person::class, AppUserActiveStatus::class, 'user_id', 'id', 'id', 'person_id');
    }

    public function getActivePersonAttribute()
    {
        $activeStatus = $this->activeStatus()->first();
        return $activeStatus ? $activeStatus->person : null;
    }
    public function person_active()
    {
       // Pridobi aktivni status za tega uporabnika
       $activeStatus = $this->activeStatus()->first();
       // Če aktivni status obstaja, vrne relacijo do osebe
       if ($activeStatus) {
           return $this->belongsTo(Person::class, 'user_person_id', 'id')
                       ->where('id', $activeStatus->person_id);
       }

       // Vrnemo null, če aktivni status ne obstaja
       return null;
    }
    //----------------------------------

}
