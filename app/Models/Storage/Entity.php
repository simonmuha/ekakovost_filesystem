<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['name'];
    public function files()
{
    return $this->belongsToMany(File::class, 'file_entity');
}

}
