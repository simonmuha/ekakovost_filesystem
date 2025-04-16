<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppEmailType extends Model
{
    use HasFactory;
    protected $table = 'app_email_types';

    protected $fillable = [
        'app_email_type_name',
        'app_email_type_name_eng',
        'app_email_type_description',
        'app_email_type_icon',
        'app_email_type_color',
    ];

    public function emails()
    {
        return $this->hasMany(AppEmail::class, 'app_email_type_id');
    }
}
