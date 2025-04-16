<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppEmailScheduleAppDay extends Model
{
    use HasFactory;
    protected $table = 'app_email_schedule_app_days';

    protected $fillable = [
        'app_email_schedule_id',
        'app_day_id',
        'app_email_schedule_time',
    ];
}
