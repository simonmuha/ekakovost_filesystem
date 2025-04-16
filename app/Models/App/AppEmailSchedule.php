<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppEmailSchedule extends Model
{
    use HasFactory;
    protected $table = 'app_email_schedules';

    protected $fillable = [
        'app_organization_id',
        'app_email_id',
        'app_email_schedule_time',
        'app_email_is_active',
        'app_email_is_holiday',
        'app_day_id',
        'app_email_schedule_is_active',

    ];

    public function email()
    {
        return $this->belongsTo(\App\Models\App\AppEmail::class, 'app_email_id');
    } 



    public function organization()
    {
        return $this->belongsTo(\App\Models\App\AppOrganization::class, 'app_organization_id');
    }
    public function day()
    {
        return $this->belongsTo(\App\Models\App\AppDay::class, 'app_day_id');
    }
    public function appEmail()
    {
        return $this->belongsTo(\App\Models\App\AppEmail::class, 'app_email_id');
    }
    public function appDay()
    {
        return $this->belongsTo(\App\Models\App\AppDay::class, 'app_day_id');
    }
}
