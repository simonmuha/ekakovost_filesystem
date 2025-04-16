<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPositionCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_position_category_parent_id',
        'app_position_category_id',
        'app_position_category_name',
        'app_position_category_name_slo',
        'app_position_category_description',
        'app_position_category_color',
        'app_position_category_background',
        'app_icon_remix_icon_id',
        'app_color_id',
        'app_color_background_id',
    ];

    public function positions()
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_category_pivots', 'app_position_category_id', 'app_position_id');   
    }
    public function positions_active()
    {
        return $this->belongsToMany(AppPosition::class, 'app_position_category_pivots', 'app_position_category_id', 'app_position_id')
                    ->wherePivot('active', true);
    }
    public function positions_category_pivot_active()
    {
        return $this->hasMany(AppPositionCategoryPivot::class, 'app_position_category_id')
                    ->where('active', true);
    }

    public function positions_old()
    {
        return $this->hasMany(AppPosition::class, 'app_position_category_id');
    }
    public function parent()
    {
        return $this->belongsTo(AppPositionCategory::class, 'app_position_category_parent_id');
    }

    /**
     * Relacija za podkategorije (subcategories).
     * Ena kategorija lahko ima več podkategorij.
     */
    public function subcategories()
    {
        return $this->hasMany(AppPositionCategory::class, 'app_position_category_parent_id');
    }

    /**
     * Relacija do 'app_icon_remix_icons'.
     * Vsaka kategorija lahko ima eno povezano ikono.
     */
    public function appIconRemixIcon()
    {
        return $this->belongsTo(AppIconRemixIcons::class, 'app_icon_remix_icon_id');
    }
    public function children()
    {
        return $this->hasMany(AppPositionCategory::class, 'app_position_category_parent_id');
    }
}
