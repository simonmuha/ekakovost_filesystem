<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppHelp extends Model
{
    use HasFactory;
    public function app_area()
    {
        return $this->belongsTo('App\Models\App\AppArea', 'app_area_id','id');
    }
    public function steps()
    {
        return $this->hasMany('App\Models\App\AppHelpStep', 'app_help_id','id');
    }
}
