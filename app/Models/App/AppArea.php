<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\App\AppPermission;
use App\Models\App\AppSideBar;
use Spatie\Permission\Models\Role;

use App\Models\Person;


class AppArea extends Model
{
    use HasFactory;
    
    public function subareas()
    {
        return $this->hasMany(AppArea::class, 'app_area_parent_id');
    }
    public function helps()
    {
        return $this->hasMany('App\Models\App\AppHelp', 'app_area_id','id');
    }
    public function faqs()
    {
        return $this->hasMany('App\Models\App\AppFaq', 'app_area_id', 'id')
                ->where('app_faq_is_active', 1);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'app_area_roles', 'app_area_id', 'role_id');
    }
    public function permissions()
    {
        return $this->hasMany(AppPermission::class, 'app_area_id');
    }
    public function parent()
    {
        return $this->belongsTo(AppArea::class, 'app_area_parent_id');
    }
    public function sidebars()
    {
        return $this->hasMany(AppSideBar::class, 'app_area_id');
    }
    public function associatedAreas()
    {
        return $this->hasManyThrough(
            AppArea::class,
            AppSideBar::class,
            'app_area_id', // Foreign key on the app_side_bars table
            'id', // Foreign key on the app_areas table
            'id', // Local key on the app_areas table
            'app_side_bar_app_area_id' // Local key on the app_side_bars table
        );
    }
    public function positions()
    {
        return $this->belongsToMany(AppPosition::class, 'app_area_app_positions');
    }
    public function people()
    {
        return $this->belongsToMany(Person::class, 'app_area_people', 'app_area_id', 'person_id');
    }
    public function appAreaPeople()
    {
        return $this->hasMany(AppAreaPerson::class, 'app_area_id');
    }
    public function user_people()
    {
        return $this->belongsToMany(Person::class, 'app_area_people', 'app_area_id', 'person_id')
                    ->withPivot('app_area_person_active');
    }
    
}
