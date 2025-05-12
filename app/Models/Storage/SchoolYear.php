<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $fillable = ['name', 'start', 'end'];

    protected $casts = [
        'start' => 'date',
        'end' => 'date'
    ];
}
