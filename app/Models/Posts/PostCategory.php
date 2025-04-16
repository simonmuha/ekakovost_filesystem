<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    public function posts()
{
    return $this->hasMany(Post::class, 'post_category_id');
}
    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id');
    }

    // Relacija za podrejene kategorije
    public function subcategories()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
    }
}
