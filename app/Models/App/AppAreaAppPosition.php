<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppAreaAppPosition extends Model
{
    use HasFactory;
    protected $fillable = ['app_area_id', 'app_position_id'];
}
