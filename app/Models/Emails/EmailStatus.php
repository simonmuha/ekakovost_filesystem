<?php

namespace App\Models\Emails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class EmailStatus extends Model
{
    use HasFactory;
    protected $fillable = ['email_status_name', 'email_status_name_eng'];

    /**
     * Povezava na e-pošte s tem statusom
     */
    public function emails()
    {
        return $this->hasMany(Email::class, 'email_status_id');
    }
}
