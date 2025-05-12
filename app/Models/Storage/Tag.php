<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = true;
}
