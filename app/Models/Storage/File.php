<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'path',
    'mime_type',
    'size',
    'filetype',
    'access',
    'comments',
    'start_date',
    'end_date'

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
