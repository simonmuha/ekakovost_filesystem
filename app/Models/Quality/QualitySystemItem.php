<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualitySystemItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_system_id',
        'parent_id',
        'quality_system_item_level_id',
        'quality_system_item_name',
        'quality_system_item_description',
        'quality_system_item_order',
    ];

    /**
     * Povezava na model QualitySystem.
     */
    public function qualitySystem()
    {
        return $this->belongsTo(QualitySystem::class);
    }

    /**
     * Povezava na nadrejeni element.
     */
    public function parent()
    {
        return $this->belongsTo(QualitySystemItem::class, 'parent_id');
    }

    /**
     * Povezava na podrejene elemente.
     */
    public function children()
    {
        return $this->hasMany(QualitySystemItem::class, 'parent_id');
    }

    /**
     * Povezava na nivo elementa (quality_system_item_level).
     */
    public function level()
    {
        return $this->belongsTo(QualitySystemItemLevel::class, 'quality_system_item_level_id');
    }
}
