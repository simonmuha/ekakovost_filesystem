<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRole extends Model
{
    use HasFactory;
    public function people()
    {
        return $this->belongsToMany(Person::class, 'app_role_people');
    }
    
}
