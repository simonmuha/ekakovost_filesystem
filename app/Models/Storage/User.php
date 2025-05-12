<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'password'];
    public $timestamps = true;
}
