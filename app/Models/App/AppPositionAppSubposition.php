<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPositionAppSubposition extends Model
{
    use HasFactory;
    protected $fillable = ['app_position_id', 'app_subposition_id'];
    public function position()
    {
        return $this->belongsTo(AppPosition::class, 'app_position_id');
    }
    public function subposition()
    {
        return $this->belongsTo(AppPosition::class, 'app_subposition_id');
    }
}
