<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualitySystemItemLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'quality_system_item_level_name',
    ];

    /**
     * Povezava na QualitySystemItem.
     */
    public function items()
    {
        return $this->hasMany(QualitySystemItem::class, 'quality_system_item_level_id');
    }
}
