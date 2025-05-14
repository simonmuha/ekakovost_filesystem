<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function entities()
{
    return $this->belongsToMany(Entity::class, 'user_entity');
}
    protected $fillable = ['name', 'password'];
    public $timestamps = true;
}
