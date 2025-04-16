<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class AppEmail extends Model
{
    use HasFactory;
    protected $table = 'app_emails';

    protected $fillable = [
        'app_email_name',
        'app_email_eng',
        'app_email_description',
        'app_email_sample',
        'app_email_code',
        'app_email_type_id',
    ];

    public function emailType()
    {
        return $this->belongsTo(AppEmailType::class, 'app_email_type_id');
    }

    public function schedules_all()
    {
        return $this->hasMany(AppEmailSchedule::class, 'app_email_id');
    }

    public function people()
    {
        return $this->belongsToMany(Person::class, 'app_email_people', 'app_email_id', 'person_id');
    }
    public function schedules($app_organization_id)
    {
        return $this->hasMany(AppEmailSchedule::class, 'app_email_id')
                    ->where('app_organization_id', $app_organization_id)
                    ->where('app_email_schedule_is_active', true) // Samo aktivni urniki
                    ->get();
    }
    
}
