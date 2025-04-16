<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AdminOrganization;
use App\Models\User;


class AdminOrganization extends Model
{
    use HasFactory;
    public function suborganizations()
    {
      return $this->hasMany(AdminOrganization::class, 'admin_organization_parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(AdminOrganization::class, 'admin_organization_parent_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'admin_organization_users', 'admin_organization_id', 'user_id');
    }

}
