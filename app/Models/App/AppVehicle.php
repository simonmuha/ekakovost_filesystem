<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\App\AppOrganization;

class AppVehicle extends Model
{
    use HasFactory;
    protected $table = 'app_vehicles';

    public function organization()
    {
        return $this->belongsTo(AppOrganization::class, 'app_organization_id');
    }
}
