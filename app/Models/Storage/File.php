<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    
    protected $fillable = [
    'user_id',
    'name',
    'url',
    'access',
    'comments',
    'start_date',
    'end_date',
];


protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'file_tag');
    }

    public function entities()
    {
        return $this->belongsToMany(Entity::class, 'file_entity');
    }

}
