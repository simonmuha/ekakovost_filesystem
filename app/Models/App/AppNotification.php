<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class AppNotification extends Model
{
    use HasFactory;
    protected $table = 'app_notifications';

    protected $fillable = [
        'person_id',
        'created_by_person_id',
        'app_notification_title',
        'app_notification_text',
        'app_notification_link',
        'app_notification_date',
        'app_notification_read_at',
    ];
    public function created_by_person()
    {
        return $this->belongsTo(Person::class, 'created_by_person_id');
    }
}
