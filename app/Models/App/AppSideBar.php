<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSideBar extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_area_id',
        'app_side_bar_app_area_id',
    ];
    
    public function app_area()
    {
        return $this->belongsTo(AppArea::class, 'app_area_id');
    }

    /**
     * Get the associated app area.
     */
    public function sidebar()
    {
        return $this->belongsTo(AppArea::class, 'app_side_bar_app_area_id');
    }
}
