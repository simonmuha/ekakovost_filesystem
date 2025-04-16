<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

use App\Models\School\SchoolOrganization;
use App\Models\App\AppPost;
use App\Models\App\AppVehicle;


class AppOrganization extends Model
{
    use HasFactory;
    public function vehicles()
    {
        return $this->hasMany(AppVehicle::class, 'app_organization_id');
    }
    public function suborganizations()
    {
      return $this->hasMany(AppOrganization::class, 'app_organization_parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(AppOrganization::class, 'app_organization_parent_id');
    }
    public function post()
    {
        return $this->belongsTo(AppPost::class, 'app_post_id');
    }
    public function people()
    {
      return $this->hasMany(Person::class, 'app_organization_id');
    }
    public function school()
    {
        return $this->hasOne(SchoolOrganization::class, 'app_organization_id');
    }
}
