<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Model;

class User_Entity extends Model
{
    protected $table = 'user_entity'; // ker je pivot
    protected $fillable = ['user_id', 'entity_id'];
    public $timestamps = true;
}
