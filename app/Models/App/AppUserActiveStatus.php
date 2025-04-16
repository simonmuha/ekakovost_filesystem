<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\User;

class AppUserActiveStatus extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function app_area()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }
    public function app_position()
    {
        return $this->belongsTo(AppPosition::class, 'app_position_id');
    }
}
