<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppEmailPerson extends Model
{
    use HasFactory;
    protected $table = 'app_email_people';

    protected $fillable = [
        'app_email_id',
        'person_id',
    ];
}
