<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $fillable = ['post_tag_name', 'post_tag_slug'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_post_tags', 'post_tag_id', 'post_id');
    }
}
