<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDay extends Model
{
    use HasFactory;
    protected $table = 'app_days';

    protected $fillable = [
        'app_day_name',
        'app_day_name_eng',
    ];

    public function schedules()
    {
        return $this->belongsToMany(AppEmailSchedule::class, 'app_email_schedule_app_days', 'app_day_id', 'app_email_schedule_id')
                    ->withPivot('app_email_schedule_time');
    }
}
