<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppCategory extends Model
{
    use HasFactory;
    protected $fillable = ['app_category_parent_id', 'app_category_name'];

    public function subcategories()
    {
      return $this->hasMany('App\Models\App\AppCategory', 'app_category_parent_id');
    }
}
