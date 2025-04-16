<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppRole;

use App\Models\Person;


class AppRolePerson extends Model
{
    use HasFactory;
    public function app_role()
    {
        return $this->belongsTo(AppRole::class, 'app_role_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
