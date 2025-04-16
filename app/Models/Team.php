<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Team extends Model
{
    use HasFactory;
    use HasRoles;

    protected $guard_name = 'web'; // or whatever guard you want to use
}